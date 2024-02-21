using AxWMPLib;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Drawing;
using System.Drawing.Printing;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices;
using System.Runtime.InteropServices.ComTypes;
using System.Windows.Forms;

namespace videoPlay
{
    public partial class Form1 : Form
    {
        // 현재 재생 중인 미디어 파일의 정보를 가져오는 메서드

        private static bool IsImageFile(string filePath)
        {
            string[] imageExtensions = { ".jpg", ".jpeg", ".png", ".gif", ".bmp" };
            string extension = Path.GetExtension(filePath);
            return imageExtensions.Contains(extension, StringComparer.OrdinalIgnoreCase);
        }
        private static bool IsVideoFile(string filePath)
        {
            string extension = Path.GetExtension(filePath).ToLower();
            return extension == ".mp4" || extension == ".avi" || extension == ".mkv" || extension == ".wmv" || extension == ".mov" || extension == ".flv";
        }
        public class MediaFileInfo
        {
            public enum MediaType
            {
                Image,
                Video
            }
            public string Number { get; set; }
            public string StartDate { get; set; }
            public string StartTime { get; set; }
            public string EndDate { get; set; }
            public string EndTime { get; set; }
            public string FilePath { get; set; }

            public MediaType FileType
            {
                get
                {
                    if (IsImageFile(FilePath))
                        return MediaType.Image;
                    else if (IsVideoFile(FilePath))
                        return MediaType.Video;
                    else
                        return MediaType.Image; // 혹시 모를 예외 상황에 대비하여 기본값은 이미지로 설정
                }
            }

        }
        public List<MediaFileInfo> FileInfos { get; set; }
        private string filePath = Path.Combine(Application.StartupPath, "data.txt");
        private static object fileLock = new object();
        private bool isMediaPlaying = false;
        private Timer timer;
        private bool formLoaded = false;
        public Form1(List<MediaFileInfo> fileInfos = null)
        {
            InitializeComponent();
            FileInfos = fileInfos ?? new List<MediaFileInfo>();
            axWindowsMediaPlayer1.Visible = false;
            axWindowsMediaPlayer1.uiMode = "none";

            // Form1이 로드될 때 실행되는 이벤트 핸들러를 등록
            this.Load += Form1_Load;

            // 종료할 때 호출되는 이벤트 핸들러 등록
            this.FormClosing += Form1_FormClosing;
            this.KeyPreview = true;
            this.KeyDown += Form1_KeyDown;
        }
        private void Form1_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Delete)
            {
                // Delete 키가 눌렸을 때 listView1_KeyDown 메소드 호출
                listView1_KeyDown(sender, e);
            }
            else if (e.KeyCode == Keys.Insert)
            {
                listView1_KeyDown(sender, e);
            }

        }

        private void listView1_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Delete)
            {   
                timer.Dispose();
                DeleteSelectedItems();
            }
            else if (e.KeyCode == Keys.Insert)
            {
                timer.Dispose();
                InsertList();
            }
        }

        private void InsertList()
        {
            if (listView1.SelectedItems.Count > 0)
            {
                listView1.Focus();
                ListViewItem selectedItem = listView1.SelectedItems[0];
                int index = selectedItem.Index;

                // 새로운 항목 생성
                ListViewItem newItem = new ListViewItem(new string[] { null, null, null, null, null, null, null });

                // 리스트뷰에 새로운 항목 추가
                listView1.Items.Insert(index, newItem);

                ReorderNumbers();
                // FileInfos를 파일에 저장

            }
        }
        private void ReorderNumbers()
        {
            // 남아있는 항목들의 순번을 다시 설정
            for (int i = 0; i < listView1.Items.Count; i++)
            {
                listView1.Items[i].SubItems[0].Text = (i + 1).ToString();
                Console.WriteLine($"Item {i + 1} - Number: {listView1.Items[i].SubItems[0].Text}");
                if ((int)(i % 2) == 1)
                {
                    listView1.Items[i].BackColor = Color.FromArgb(240, 240, 240);
                }
                else
                {
                    listView1.Items[i].BackColor = Color.FromArgb(255, 255, 255);
                }
            }
        }
        private void DeleteSelectedItems()
        {
            // ListView에서 선택된 항목들을 반복하면서 삭제
            listView1.Focus();
            Console.WriteLine($"Deleting: {filePath}");

            // 삭제된 항목이나 정렬된 항목을 추적할 변수
            int deletedItemCount = 0;

            // 삭제할 항목들을 저장할 리스트
            List<MediaFileInfo> itemsToRemove = new List<MediaFileInfo>();

            // 삭제된 항목의 인덱스를 저장할 리스트
            List<int> deletedItemIndexes = new List<int>();

            for (int row = listView1.Items.Count - 1; row >= 0; row--)
            {
                if (listView1.Items[row].Selected)
                {
                    // ListViewItem에서 파일 정보를 추출
                    // ...
                    string number = listView1.Items[row].SubItems[0].Text;
                    string startDate = listView1.Items[row].SubItems[1].Text;
                    string startTime = listView1.Items[row].SubItems[2].Text;
                    string endDate = listView1.Items[row].SubItems[3].Text;
                    string endTime = listView1.Items[row].SubItems[4].Text;
                    string filePath = Path.Combine(Application.StartupPath, listView1.Items[row].SubItems[5].Text);
                    // 선택된 항목을 삭제할 리스트에 추가
                    itemsToRemove.Add(new MediaFileInfo
                    {
                        Number = number,
                        StartDate = startDate,
                        StartTime = startTime,
                        EndDate = endDate,
                        EndTime = endTime,
                        FilePath = filePath
                    });

                    // 삭제된 항목의 인덱스를 저장
                    deletedItemIndexes.Add(row);
                }
            }

            // 삭제할 항목들을 FileInfos 리스트에서 제거
            foreach (var itemToRemove in itemsToRemove)
            {
                FileInfos.RemoveAll(x => x.Number == itemToRemove.Number &&
                                          x.StartDate == itemToRemove.StartDate &&
                                          x.StartTime == itemToRemove.StartTime &&
                                          x.EndDate == itemToRemove.EndDate &&
                                          x.EndTime == itemToRemove.EndTime &&
                                          x.FilePath == itemToRemove.FilePath);
            }

            // 삭제된 항목들의 인덱스를 이용하여 남아있는 항목들의 순번을 다시 설정
            foreach (int deletedIndex in deletedItemIndexes)
            {
                listView1.Items.RemoveAt(deletedIndex);
            }

            for (int i = 0; i < listView1.Items.Count; i++)
            {
                listView1.Items[i].SubItems[0].Text = (i + 1).ToString();
                if ((int)(i % 2) == 1) listView1.Items[i].BackColor = Color.FromArgb(240, 240, 240);
                else listView1.Items[i].BackColor = Color.FromArgb(255, 255, 255);
            }

            // SaveDataToFile 호출하여 삭제된 항목이 파일에 반영되도록 함
            SaveDataToFile();

            // ...
        }

        private void SaveDataToFile()
        {
            try
            {
                Console.WriteLine($"listView1.Items.Count = {listView1.Items.Count}");
                Console.WriteLine($"FileInfos.Count = {FileInfos.Count}");
                lock (fileLock)
                {
                    // FileInfos 리스트를 listView1의 순서에 맞게 업데이트
                    for (int i = 0; i < listView1.Items.Count; i++)
                    {
                        FileInfos[i].Number = listView1.Items[i].SubItems[0].Text;
                        FileInfos[i].StartDate = listView1.Items[i].SubItems[1].Text;
                        FileInfos[i].StartTime = listView1.Items[i].SubItems[2].Text;
                        FileInfos[i].EndDate = listView1.Items[i].SubItems[3].Text;
                        FileInfos[i].EndTime = listView1.Items[i].SubItems[4].Text;
                        FileInfos[i].FilePath = listView1.Items[i].SubItems[5].Text;
                        // 나머지 필드도 업데이트
                    }

                    // 파일에 저장
                    string jsonData = JsonConvert.SerializeObject(FileInfos, Formatting.Indented);
                    File.WriteAllText(filePath, jsonData);
                    Console.WriteLine("Data saved successfully");
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Save error: {ex.Message}");
                Console.WriteLine($"Save error stack trace: {ex.StackTrace}");
                throw;
            }
        }
        private void LoadDataFromFile()
        {
            // 파일이 존재하는지 확인
            if (File.Exists(filePath))
            {
                try
                {
                    // 파일에서 JSON 형식의 데이터 읽어오기
                    string jsonData;
                    using (StreamReader reader = new StreamReader(filePath))
                    {
                        jsonData = reader.ReadToEnd();
                    }

                    // List<MediaFileInfo>로 변환
                    FileInfos = JsonConvert.DeserializeObject<List<MediaFileInfo>>(jsonData);
                    if (FileInfos == null)
                    {
                        FileInfos = new List<MediaFileInfo>(); // null인 경우 초기화
                    }

                    Console.WriteLine("Data loaded successfully");
                }
                catch (Exception ex)
                {
                    Console.WriteLine($"Load error: {ex.Message}");
                }
            }
        }
        private Tuple<int, int> LoadSettings()
        {
            int width = 0;
            int height = 0;

            try
            {
                if (File.Exists("settings.txt"))
                {
                    using (StreamReader reader = new StreamReader("settings.txt"))
                    {
                        width = int.Parse(reader.ReadLine());
                        height = int.Parse(reader.ReadLine());
                    }
                }
                else
                {
                    // 파일이 없으면 기본값 설정
                    width = 32;
                    height = 16;

                    // 기본값을 파일에 저장
                    SaveSettings(width, height);
                }
            }
            catch (Exception ex)
            {
                // 파일을 읽거나 파싱하는 도중에 오류가 발생할 수 있습니다.
                // 오류 처리를 추가하거나 기본값을 반환하도록 수정할 수 있습니다.
                MessageBox.Show("Save Fail");
                Console.WriteLine(ex.Message);
            }

            return Tuple.Create(width, height);
        }

        private void SaveSettings(int width, int height)
        {
            try
            {
                using (StreamWriter writer = new StreamWriter("settings.txt"))
                {
                    writer.WriteLine(width);
                    writer.WriteLine(height);
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
                // 파일을 쓰는 도중에 오류가 발생할 수 있습니다.
                // 오류 처리를 추가하거나 다른 방법으로 저장하도록 수정할 수 있습니다.
            }
        }

        private void ApplySettings(Form1 form, int width, int height)
        {
            // 현재 폼이 로드된 상태인 경우에만 초기화된 값으로 셋팅
            if (!form.IsHandleCreated)
            {
                AxWMPLib.AxWindowsMediaPlayer mediaPlayer = form.Controls["axWindowsMediaPlayer1"] as AxWMPLib.AxWindowsMediaPlayer;
                mediaPlayer.Width = width * 16;
                mediaPlayer.Height = height * 16;

                PictureBox pictureBox1 = form.Controls["pictureBox1"] as PictureBox;
                pictureBox1.Width = width * 16;
                pictureBox1.Height = height * 16;

                RichTextBox richTextBox1 = form.Controls["richTextBox1"] as RichTextBox;
                richTextBox1.Width = width * 16;
                richTextBox1.Height = height * 16;
                
            }
        }
      
        private void Form1_Load(object sender, EventArgs e)
        {
            this.Location = new Point(0, 0);
            label12.Text = "1. 오류시 프로그램 재실행\n2. insert, delete 작업 혹은 열,단 작업 후 적용버튼 클릭(타이머 재실행)\n3. 리스트 모든 파일이 종료시간이 지난 후 재실행시 멈춘다면 프로그램 재시작 후 delete키로 리스트 삭제\n";
            foreach (MediaFileInfo fileInfo in FileInfos)
            {
                string[] fileInfoArray = new string[]
                {
                    fileInfo.Number,
                    fileInfo.StartDate,
                    fileInfo.StartTime,
                    fileInfo.EndDate,
                    fileInfo.EndTime,
                    Path.GetFullPath(fileInfo.FilePath)
                };

                // ListView에 추가
                ListViewItem item = new ListViewItem(fileInfoArray);
                listView1.Items.Add(item);
            }

            Tuple<int, int> savedSettings = LoadSettings();
            int savedWidth = savedSettings.Item1;
            int savedHeight = savedSettings.Item2;

            RichTextBox richTextBox1 = this.Controls["richTextBox1"] as RichTextBox;
            richTextBox1.Width = savedWidth * 16;
            richTextBox1.Height = savedHeight * 16;
            // 가로 및 세로 값이 저장되어 있다면 적용
            if (savedWidth > 0 && savedHeight > 0)
            {
                ApplySettings(this, savedWidth, savedHeight);
            }
            InitializeComboBox(comboBox1, 1, 33, 31);
            InitializeComboBox(comboBox2, 1, 17, 15);

            // 파일에서 데이터를 읽어와서 리스트에 설정

            if (savedWidth > 0 && savedHeight > 0)
            {
                // comboBox1에서 savedWidth에 해당하는 인덱스 찾기
                int widthIndex = comboBox1.FindStringExact(savedWidth.ToString());
                if (widthIndex != -1)
                {
                    this.comboBox1.SelectedIndex = widthIndex;
                }

                // comboBox2에서 savedHeight에 해당하는 인덱스 찾기
                int heightIndex = comboBox2.FindStringExact(savedHeight.ToString());
                if (heightIndex != -1)
                {
                    this.comboBox2.SelectedIndex = heightIndex;
                }
            }
            // 파일 로드
            LoadDataFromFile();

            listView1.Items.Clear();
            listView1.View = View.Details;
            listView1.GridLines = true;
            listView1.FullRowSelect = true;

            listView1.Columns.Add("번호", 50, HorizontalAlignment.Right);
            listView1.Columns.Add("시작일자", 120, HorizontalAlignment.Left);
            listView1.Columns.Add("시작 시간", 120, HorizontalAlignment.Center);
            listView1.Columns.Add("종료 일자", 120, HorizontalAlignment.Center);
            listView1.Columns.Add("종료 시간", 120, HorizontalAlignment.Center);
            listView1.Columns.Add("파일", 400, HorizontalAlignment.Center);

            // 기존 콤보박스 아이템 지우고 새로운 아이템 추가
            
           
            InitializeComboBox(comboBox3, 0, 25, 0);
            InitializeComboBox(comboBox5, 0, 24, 23);
            InitializeComboBox(comboBox4, 0, 56, 0, 5);
            InitializeComboBox(comboBox6, 0, 56, 0, 5);

            foreach (MediaFileInfo fileInfo in FileInfos)
            {
                string[] fileInfoArray = new string[]
                {
                    fileInfo.Number,
                    fileInfo.StartDate,
                    fileInfo.StartTime,
                    fileInfo.EndDate,
                    fileInfo.EndTime,
                    Path.GetFullPath(fileInfo.FilePath)
                };

                // ListView에 추가
                ListViewItem item = new ListViewItem(fileInfoArray);
                listView1.Items.Add(item);
            }

            // 파일 리스트가 비어있지 않은 경우에 대해서 처리
            if (FileInfos.Count > 0)
            {
                // 처음 파일 정보를 가져옴
                MediaFileInfo firstFileInfo = FileInfos.First();

                // 처음 파일이 이미지인 경우 PictureBox에 이미지를 표시하고 크기 설정
                if (IsImageFile(firstFileInfo.FilePath))
                {
                    pictureBox1.ImageLocation = firstFileInfo.FilePath;
                    pictureBox1.SizeMode = PictureBoxSizeMode.Zoom;
                    pictureBox1.Visible = true;

                    axWindowsMediaPlayer1.Visible = false; // 동영상 플레이어 숨김
                }
                else // 처음 파일이 동영상인 경우 AxWindowsMediaPlayer로 플레이어 설정
                {
                    axWindowsMediaPlayer1.URL = firstFileInfo.FilePath;
                    axWindowsMediaPlayer1.Visible = true;
                    pictureBox1.Visible = false; // 이미지 숨김
                }
            }
            // 타이머 설정
            axWindowsMediaPlayer1.PlayStateChange += axWindowsMediaPlayer1_PlayStateChange;

            
            timer = new Timer();
            timer.Interval = 5000; // 5초
            timer.Tick += timer_Tick;
            timer.Start();
            formLoaded = true;

        }

        private void Form1_FormClosing(object sender, FormClosingEventArgs e)
        {
            // 어플리케이션이 종료될 때 파일 저장
            timer.Dispose();
            SaveDataToFile();
            int currentWidth = Convert.ToInt32(comboBox1.SelectedItem);
            int currentHeight = Convert.ToInt32(comboBox2.SelectedItem);
            SaveSettings(currentWidth, currentHeight);
        }
        private void button1_Click(object sender, EventArgs e)
        {
            //Application.Exit();
            Process.GetCurrentProcess().Kill();
        }
        private void button3_Click(object sender, EventArgs e)
        {
            this.Hide();
            timer.Dispose();
            // 새로운 Form1 생성 및 위치 설정
            Form1 NEWform1 = (Form1)Application.OpenForms["Form1"];
            NEWform1.Location = new Point(0, 0);
            NEWform1.timer = new Timer();
            NEWform1.timer.Interval = 5000; // 5초
            NEWform1.timer.Tick += NEWform1.timer_Tick;
            NEWform1.timer.Start();
            int setWidth = Convert.ToInt32(comboBox1.SelectedItem);
            int setHeight = Convert.ToInt32(comboBox2.SelectedItem);
            SaveSettings(setWidth, setHeight);
            Tuple<int, int> savedSettings = LoadSettings();
            int savedWidth = savedSettings.Item1;
            int savedHeight = savedSettings.Item2;

            RichTextBox richTextBox1 = NEWform1.Controls["richTextBox1"] as RichTextBox;
            richTextBox1.Width = savedWidth * 16;
            richTextBox1.Height = savedHeight * 16;

            // 가로 및 세로 값 적용
            ApplySettings(NEWform1, savedWidth, savedHeight);


            NEWform1.Show();
        }
        private void button4_Click(object sender, EventArgs e) //이게 추가버튼
        {
            panel1.Visible = true;
        }

        private void label3_Click(object sender, EventArgs e)
        {
        }

        private void button6_Click(object sender, EventArgs e)
        {
            panel1.Visible = false;
        }
        private void button5_Click(object sender, EventArgs e)
        {
            using (OpenFileDialog openFileDialog = new OpenFileDialog())
            {
                openFileDialog.Filter = "동영상 및 이미지 파일 (*.mp4;*.avi;*.mkv;*.wmv;*.mov;*.flv;*.png;*.jpg;*.bmp)|*.mp4;*.avi;*.mkv;*.wmv;*.mov;*.flv;*.png;*.jpg;*.bmp|모든 파일 (*.*)|*.*";

                if (openFileDialog.ShowDialog() == DialogResult.OK)
                {
                    // DatePicker로부터 시작일자와 종료일자를 가져오기
                    DateTime startDate = dateTimePicker2.Value;
                    DateTime endDate = dateTimePicker1.Value;

                    // 시작 시간 및 분을 가져오기
                    int startTimeHour = Convert.ToInt32(comboBox3.SelectedItem);
                    int startTimeMinute = Convert.ToInt32(comboBox4.SelectedItem);

                    int endTimeHour = Convert.ToInt32(comboBox5.SelectedItem);
                    int endTimeMinute = Convert.ToInt32(comboBox6.SelectedItem);

                    // 시작일자 및 종료일자에 시간 및 분을 반영
                    startDate = startDate.AddHours(startTimeHour).AddMinutes(startTimeMinute);
                    endDate = endDate.AddHours(endTimeHour).AddMinutes(endTimeMinute);
                    if (startDate > endDate)
                    {
                        endDate = startDate.AddHours(endTimeHour).AddMinutes(endTimeMinute);
                        
                    }
                    lock (fileLock)
                    {
                        if (File.Exists(filePath))
                        {
                            // 파일이 이미 존재하는 경우, 파일 열고 정보 추가
                            FileInfos = JsonConvert.DeserializeObject<List<MediaFileInfo>>(File.ReadAllText(filePath));

                            // number 변수를 기존 파일 개수에 1을 더한 값으로 초기화
                            int number = FileInfos.Count + 1;

                            // 빈칸에 삽입할 위치를 찾음
                            int emptyIndex = FindEmptyIndexFromListView();

                            MediaFileInfo fileInfo;

                            if (emptyIndex + 1 == number)
                            {
                                fileInfo = new MediaFileInfo
                                {
                                    Number = number.ToString(),
                                    StartDate = startDate.ToString("yyyy-MM-dd"),
                                    StartTime = startDate.ToString("HH:mm"),
                                    EndDate = endDate.ToString("yyyy-MM-dd"),
                                    EndTime = endDate.ToString("HH:mm"),
                                    FilePath = Path.GetFullPath(openFileDialog.FileName)
                                };
                                ListViewItem item = new ListViewItem(new string[]
                                {
                                     fileInfo.Number,
                                     fileInfo.StartDate,
                                     fileInfo.StartTime,
                                     fileInfo.EndDate,
                                     fileInfo.EndTime,
                                     Path.GetFullPath(openFileDialog.FileName)
                                });
                                listView1.Items.Add(item);
                            }
                            else
                            {
                                // 만약 emptyIndex + 1 이 number와 다르면 emptyIndex + 1로 Number 값을 설정
                                fileInfo = new MediaFileInfo
                                {
                                    Number = (emptyIndex + 1).ToString(),
                                    StartDate = startDate.ToString("yyyy-MM-dd"),
                                    StartTime = startDate.ToString("HH:mm"),
                                    EndDate = endDate.ToString("yyyy-MM-dd"),
                                    EndTime = endDate.ToString("HH:mm"),
                                    FilePath = Path.GetFullPath(openFileDialog.FileName)
                                };
                            }

                            int targetIndex = emptyIndex;

                            // 확인 코드
                            if (targetIndex < listView1.Items.Count)
                            {
                                listView1.Items[targetIndex].SubItems[0].Text = fileInfo.Number;
                                listView1.Items[targetIndex].SubItems[1].Text = fileInfo.StartDate;
                                listView1.Items[targetIndex].SubItems[2].Text = fileInfo.StartTime;
                                listView1.Items[targetIndex].SubItems[3].Text = fileInfo.EndDate;
                                listView1.Items[targetIndex].SubItems[4].Text = fileInfo.EndTime;
                                listView1.Items[targetIndex].SubItems[5].Text = Path.GetFullPath(openFileDialog.FileName);
                            }
                            else
                            {
                                // 인덱스가 유효하지 않은 경우에 대한 처리
                                Console.WriteLine("Index is out of range!");
                            }

                            // 리스트뷰와 FileInfos에 새로운 항목 삽입
                            FileInfos.Insert(emptyIndex, fileInfo);

                            // JSON 형식으로 저장
                            SaveDataToFile();
                        }
                        else
                        {
                            // 파일이 존재하지 않는 경우, 새로운 파일 생성
                            FileInfos = new List<MediaFileInfo>();

                            int number = 1;
                            MediaFileInfo fileInfo = new MediaFileInfo
                            {
                                Number = number.ToString(),
                                StartDate = startDate.ToString("yyyy-MM-dd"),
                                StartTime = startDate.ToString("HH:mm"),
                                EndDate = endDate.ToString("yyyy-MM-dd"),
                                EndTime = endDate.ToString("HH:mm"),
                                FilePath = Path.GetFullPath(openFileDialog.FileName)
                            };

                            // ListView에 추가
                            ListViewItem item = new ListViewItem(new string[]
                            {
                                 fileInfo.Number,
                                 fileInfo.StartDate,
                                 fileInfo.StartTime,
                                 fileInfo.EndDate,
                                 fileInfo.EndTime,
                                 Path.GetFullPath(openFileDialog.FileName)
                            });

                            // 리스트뷰와 FileInfos에 새로운 항목 삽입
                            listView1.Items.Add(item);
                            FileInfos.Add(fileInfo);

                            // JSON 형식으로 저장
                            SaveDataToFile();
                        }
                    }
                }
            }
        }

        private int FindEmptyIndexFromListView()
        {
            for (int i = 0; i < listView1.Items.Count; i++)
            {
                if (string.IsNullOrEmpty(listView1.Items[i].SubItems[5].Text))
                {
                    return i;
                }
            }

            return listView1.Items.Count; // 빈 문자열이 없으면 리스트의 끝에 추가
        }

        private bool AllSubItemsEmpty(ListViewItem item)
        {
            foreach (ListViewItem.ListViewSubItem subItem in item.SubItems)
            {
                if (!string.IsNullOrEmpty(subItem.Text.Trim()))
                {
                    return false;
                }
            }
            return true;
        }

        /*   private void CheckMediaFileTimes()
           {
               // 현재 시간을 가져오기
               DateTime currentDateTime = DateTime.Now;

               // 시작 시간이 현재 시간 이후이고 종료 시간이 현재 시간 이전인 파일만 선택
               List<MediaFileInfo> validFiles = FileInfos
                   .Where(fileInfo =>
                       DateTime.Parse(fileInfo.StartDate + " " + fileInfo.StartTime) >= currentDateTime &&
                       DateTime.Parse(fileInfo.EndDate + " " + fileInfo.EndTime) <= currentDateTime)
                   .ToList();

               // 기존 리스트뷰 초기화
               listView1.Items.Clear();

               // 선택된 파일을 리스트뷰에 추가
               foreach (MediaFileInfo fileInfo in validFiles)
               {
                   string[] fileInfoArray = new string[]
                   {
                       fileInfo.Number,
                       fileInfo.StartDate,
                       fileInfo.StartTime,
                       fileInfo.EndDate,
                       fileInfo.EndTime,
                       Path.GetFullPath(fileInfo.FilePath)
                   };

                   // ListView에 추가
                   ListViewItem item = new ListViewItem(fileInfoArray);
                   listView1.Items.Add(item);
               }

               // 제거된 파일을 UI에서도 업데이트
               UpdateListView();
           }
           private void UpdateListView()
           {
               // 시작시간이 지났고 종료시간이 지나지 않은 미디어 파일을 리스트에 추가
               List<MediaFileInfo> currentFiles = FileInfos
                   .Where(file =>

                       DateTime.Now <= DateTime.Parse(file.EndDate + " " + file.EndTime))
                   .ToList();

               // 현재 재생 중인 파일의 인덱스를 초기화


               // ListView 업데이트
               UpdateListViewItems(currentFiles);

               // 종료시간이 지난 파일을 리스트에서 제거
               foreach (MediaFileInfo file in FileInfos.Except(currentFiles).ToList())
               {
                   RemoveMediaFile(file);
               }
           }
           private void UpdateListViewItems(List<MediaFileInfo> files)
           {
               listView1.Items.Clear();

               foreach (MediaFileInfo fileInfo in files)
               {
                   string[] fileInfoArray = new string[]
                   {
                       fileInfo.Number,
                       fileInfo.StartDate,
                       fileInfo.StartTime,
                       fileInfo.EndDate,
                       fileInfo.EndTime,
                       Path.GetFullPath(fileInfo.FilePath)
                   };

                   ListViewItem item = new ListViewItem(fileInfoArray);
                   listView1.Items.Add(item);
               }
           }
           private void RemoveMediaFile(MediaFileInfo fileInfo)
           {
               // 리스트에서 제거
               FileInfos.Remove(fileInfo);

               // JSON 형식으로 저장


               // ListView에서도 제거
               RemoveListViewItem(fileInfo);
               ReorderNumbers();
               SaveDataToFile();
           }
           private void RemoveListViewItem(MediaFileInfo fileInfo)
           {
               // ListViewItem 제거
               ListViewItem itemToRemove = listView1.Items
                   .Cast<ListViewItem>()
                   .FirstOrDefault(item => item.SubItems[0].Text == fileInfo.Number);

               if (itemToRemove != null)
               {
                   listView1.Items.Remove(itemToRemove);
               }

           }*/ //자동제거문
        private bool IsMediaFilePlaying(MediaFileInfo fileInfo)
        {
            // 현재 재생 중인 파일이 fileInfo와 일치하면 true 반환
            if (axWindowsMediaPlayer1.playState == WMPLib.WMPPlayState.wmppsPlaying &&
                axWindowsMediaPlayer1.URL == fileInfo.FilePath)
            {
                return true;
            }
            return false;
        }
  

        private void timer_Tick(object sender, EventArgs e)
        {
            label11.Text = timer.Interval.ToString();
            // 현재 재생 중인 미디어 파일 정보 가져오기
            if (currentFileIndex >= 0 && currentFileIndex < FileInfos.Count)
            {
                MediaFileInfo currentFileInfo = FileInfos[currentFileIndex];

                // 현재 재생 중인 파일이 이미지인 경우 5초마다 다음 파일로 전환
                if (currentFileInfo != null && IsImageFile(currentFileInfo.FilePath))
                {
                    // 이미지일 경우 5초 인터벌
                    timer.Interval = 5000;

                }
               // CheckMediaFileTimes();
                NextMediaFile();

                timer.Enabled = true;
            }
            else
            {
                if (currentFileIndex >= 0 && currentFileIndex < FileInfos.Count)
                {
                    currentFileIndex++;

                    if (currentFileIndex >= FileInfos.Count)
                    {
                        currentFileIndex = 0;
                    }
                    MediaFileInfo currentFileInfo = FileInfos[currentFileIndex];
                    // 현재 재생 중인 파일이 이미지인 경우 5초마다 다음 파일로 전환
                    if (currentFileInfo != null && IsImageFile(currentFileInfo.FilePath))
                    {
                        // 이미지일 경우 5초 인터벌
                        timer.Interval = 5000;

                    }
               //     CheckMediaFileTimes();
                    NextMediaFile();

                    timer.Enabled = true;
                }
                else
                {
                    MessageBox.Show("리스트가 비었습니다");
                    timer.Enabled = false;
                }
            }
        }

        private int currentFileIndex = 0; // 현재 재생 중인 파일의 인덱스
        private void NextMediaFile()
        {
            try
            {
                if (FileInfos != null && FileInfos.Count > 0)
                {
                    // 현재 재생 중인 미디어 파일 정보 가져오기
                    MediaFileInfo currentFileInfo = FileInfos[currentFileIndex];

                    // 현재 재생 중인 파일이 동영상이라면 정지
                    if (currentFileInfo != null && IsVideoFile(currentFileInfo.FilePath))
                    {
                        axWindowsMediaPlayer1.Ctlcontrols.stop();
                        isMediaPlaying = false;
                    }

                    // 다음 파일로 이동
                    currentFileIndex++;

                    // 마지막 파일까지 재생하면 처음 파일로 돌아가기
                    if (currentFileIndex >= FileInfos.Count)
                    {
                        currentFileIndex = 0;
                    }

                    // 파일 인덱스에 해당하는 파일 가져오기
                    MediaFileInfo nextFileInfo = FileInfos[currentFileIndex];

                    // 추가: 시작 시간이 현재 시각보다 뒤면 다음 파일로 넘어가기
                    while (nextFileInfo != null && (DateTime.Parse(nextFileInfo.StartDate + " " + nextFileInfo.StartTime) > DateTime.Now || (DateTime.Parse(nextFileInfo.EndDate + " " + nextFileInfo.EndTime) < DateTime.Now)))
                    {
                        currentFileIndex++;

                        if (currentFileIndex >= FileInfos.Count)
                        {
                            currentFileIndex = 0;
                        }

                        nextFileInfo = FileInfos[currentFileIndex];
                    }

                    // 파일 처리 로직 추가
                    HandleMediaFile(nextFileInfo, currentFileInfo);
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"NextMediaFile error: {ex.Message}");
                Console.WriteLine($"NextMediaFile error stack trace: {ex.StackTrace}");
            }
        }


        private void HandleMediaFile(MediaFileInfo fileInfo, MediaFileInfo currentFileInfo)
        {
            try
            {
                // 이전에 사용한 "pictureBox" 이름을 가진 컨트롤들을 모두 제거
                while (Controls.ContainsKey("pictureBox"))
                {
                    PictureBox existingPictureBox = Controls["pictureBox"] as PictureBox;

                    // PictureBox의 애니메이션 중지
                    ImageAnimator.StopAnimate(existingPictureBox.Image, null);

                    // PictureBox의 이미지 해제
                    existingPictureBox.Image = null;

                    // PictureBox 제거
                    Controls.Remove(existingPictureBox);
                    existingPictureBox.Dispose();
                }

                if (!string.IsNullOrEmpty(fileInfo.FilePath))
                {
                    if (IsImageFile(fileInfo.FilePath))
                    {
                        // 이미지 파일일 경우
                        axWindowsMediaPlayer1.Visible = false;
                        int setWidth = Convert.ToInt32(comboBox1.SelectedItem);
                        int setHeight = Convert.ToInt32(comboBox2.SelectedItem);
                        // PictureBox 초기화
                        PictureBox newPictureBox = new PictureBox
                        {
                            Name = "pictureBox",
                            Width = setWidth*16, // 이미지의 가로 크기 설정
                            Height = setHeight*16, // 이미지의 세로 크기 설정
                            SizeMode = PictureBoxSizeMode.StretchImage
                        };

                        try
                        {
                            Console.WriteLine(fileInfo.FilePath);
                            pictureBox1.Visible = false;
                            newPictureBox.Image = Image.FromFile(fileInfo.FilePath);
                        }
                        catch (Exception ex)
                        {
                            Console.WriteLine($"Error loading image: {ex.Message}");
                            Console.WriteLine($"Stack trace: {ex.StackTrace}");
                            // 예외 처리 추가
                        }

                        // Form1의 컨트롤로 추가
                        Controls.Add(newPictureBox);
                        timer.Interval = 5000;
                    }
                    else if (IsVideoFile(fileInfo.FilePath))
                    {
                        pictureBox1.Visible = false;
                        // 동영상 파일일 경우
                        axWindowsMediaPlayer1.Visible = true;


                        // 동영상 크기 설정
                        int setWidth = Convert.ToInt32(comboBox1.SelectedItem) * 16;
                        int setHeight = Convert.ToInt32(comboBox2.SelectedItem) * 16;

                        axWindowsMediaPlayer1.Width = setWidth;
                        axWindowsMediaPlayer1.Height = setHeight;

                        // 현재 동영상이 아닌 경우에만 새로운 URL을 설정하고 재생
                        if (!IsMediaFilePlaying(fileInfo) && !isMediaPlaying)
                        {
                            axWindowsMediaPlayer1.URL = fileInfo.FilePath;

                            // PlayStateChange 이벤트에서 다음 동영상을 자동으로 재생하도록 설정
                            axWindowsMediaPlayer1.PlayStateChange += axWindowsMediaPlayer1_PlayStateChange;

                            // 동영상 재생
                            axWindowsMediaPlayer1.Ctlcontrols.play();
                            isMediaPlaying = true;
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"HandleMediaFile error: {ex.Message}");
                Console.WriteLine($"HandleMediaFile error stack trace: {ex.StackTrace}");
            }
        }

        private void axWindowsMediaPlayer1_PlayStateChange(object sender, AxWMPLib._WMPOCXEvents_PlayStateChangeEvent e)
        {
            if ((WMPLib.WMPPlayState)e.newState == WMPLib.WMPPlayState.wmppsMediaEnded)
            {
                // 동영상이 종료된 경우 다음 미디어로 전환
                NextMediaFile();
            }
            else if ((WMPLib.WMPPlayState)e.newState == WMPLib.WMPPlayState.wmppsPlaying)
            {
                // 동영상이 재생되고 있을 때
                MediaFileInfo currentFileInfo = FileInfos[currentFileIndex];
                if (currentFileInfo != null && IsVideoFile(currentFileInfo.FilePath))
                {
                    // 동영상 길이 표시
                    int videoDuration = (int)axWindowsMediaPlayer1.currentMedia.duration * 1000; // 동영상 길이 (밀리초)

                    // 타이머 설정 업데이트
                    timer.Stop();
                    timer.Interval = videoDuration;
                    timer.Start();
                }
            }
        }

        private void InitializeComboBox(ComboBox comboBox, int start, int end, int selectedIndex)
        {
            comboBox.Items.Clear();
            for (int i = start; i < end; i++)
            {
                comboBox.Items.Add(i.ToString());
            }
            comboBox.SelectedIndex = selectedIndex;
        }

        private void InitializeComboBox(ComboBox comboBox, int start, int end, int selectedIndex, int step)
        {
            comboBox.Items.Clear();
            for (int i = start; i < end; i += step)
            {
                comboBox.Items.Add(i.ToString());
            }
            comboBox.SelectedIndex = selectedIndex;
        }

        private void richTextBox1_MouseUp(object sender, MouseEventArgs e)
        {
            if (e.Button == MouseButtons.Right)
            {
                
                using (ColorDialog colorDialog = new ColorDialog())
                {
                    if (colorDialog.ShowDialog() == DialogResult.OK)
                    {
                        // 선택된 색상을 가져옴
                        Color selectedColor = colorDialog.Color;

                        // 현재 선택된 텍스트의 시작 위치와 길이를 가져옴
                        int selectionStart = richTextBox1.SelectionStart;
                        int selectionLength = richTextBox1.SelectionLength;

                        // 선택된 텍스트의 색상을 변경
                        richTextBox1.SelectionStart = selectionStart;
                        richTextBox1.SelectionLength = selectionLength;
                        richTextBox1.SelectionColor = selectedColor;

                        using (FontDialog fontDialog = new FontDialog())
                        {
                            if (fontDialog.ShowDialog() == DialogResult.OK)
                            {
                                Font selectedFont = fontDialog.Font;

                                    selectionStart = richTextBox1.SelectionStart;
                                    selectionLength = richTextBox1.SelectionLength;

                                // 선택된 텍스트의 폰트를 변경
                                richTextBox1.SelectionFont = selectedFont;

                                // 나머지 폰트 스타일도 변경할 수 있습니다.
                                // richTextBox1.SelectionFont = new Font("Arial", fontSize, FontStyle.Bold | FontStyle.Italic);
                            }
                        }
                    }
                }
            }
        }
        private void richTextBox1_Enter(object sender, EventArgs e)
        {
            // RichTextBox가 포커스를 얻었을 때 빈 텍스트를 가운데 정렬
            if (richTextBox1.Text == "")
            {
                richTextBox1.SelectionAlignment = HorizontalAlignment.Center;
            }
        }

        private void richTextBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            // 사용자가 텍스트를 입력할 때마다 가운데 정렬 유지
            CenterTextInRichTextBox();
        }

        private void richTextBox1_Leave(object sender, EventArgs e)
        {
            // RichTextBox에서 포커스를 잃었을 때 빈 텍스트이면 다시 가운데 정렬 해제
            if (richTextBox1.Text == "")
            {
                richTextBox1.SelectionAlignment = HorizontalAlignment.Left;
            }
        }
        private void CenterTextInRichTextBox()
        {
            // 현재 선택된 텍스트의 시작 위치
            int selectionStart = richTextBox1.SelectionStart;

            // 수평 가운데 정렬
            richTextBox1.SelectionAlignment = HorizontalAlignment.Center;

            // 수직 가운데 정렬 계산
            int totalLines = richTextBox1.GetLineFromCharIndex(richTextBox1.TextLength) + 1;
            int totalHeight = totalLines * richTextBox1.Font.Height;
            int verticalOffset = (richTextBox1.Height - totalHeight) / 2;

            // 현재 선택된 텍스트의 시작 위치로 이동
            richTextBox1.SelectionStart = selectionStart;

            // 현재 선택된 텍스트 길이 만큼 선택
            richTextBox1.SelectionLength = richTextBox1.Text.Length;

            // 수직 가운데 정렬 적용
            richTextBox1.SelectionCharOffset = verticalOffset;

            richTextBox1.ScrollToCaret();
            richTextBox1.SelectionCharOffset = 0; // 초기화
        }

        private void makeImg_Click(object sender, EventArgs e)
        {
            SaveRichTextBoxAsImage(richTextBox1);
        }

        private void SaveRichTextBoxAsImage(RichTextBox richTextBox)
        {
            int setWidth = Convert.ToInt32(comboBox1.SelectedItem);
            int setHeight = Convert.ToInt32(comboBox2.SelectedItem);
            int cellPixelSize = 16;
            int width = setWidth * cellPixelSize;
            int height = setHeight * cellPixelSize;

            // RichTextBox의 크기로 이미지 생성
            Bitmap bitmap = new Bitmap(width, height);

            using (Graphics graphics = Graphics.FromImage(bitmap))
            {
                // 흰색 배경으로 초기화
                graphics.Clear(Color.Black); // 배경을 흰색으로 설정

                // 현재 RichTextBox의 폰트 크기를 가져오기
                int fontSize = (int)richTextBox.Font.Size;

                // 모든 줄의 높이를 계산
                int totalHeight = richTextBox.Lines.Length * (fontSize + 10);

                // 이미지의 세로 중앙에 위치할 y 좌표 계산
                int yOffset = 0; // 세로 중앙 정렬을 맨 위에 위치하도록 변경

                for (int i = 0; i < richTextBox.Lines.Length; i++)
                {
                    int charIndex = richTextBox.GetFirstCharIndexFromLine(i);
                    float lineLength = graphics.MeasureString(richTextBox.Lines[i], richTextBox.Font).Width;

                    // 가로 중앙 정렬을 위해 xOffset을 조정
                    float xOffset = (width - lineLength) / 2;

                    for (int j = 0; j < richTextBox.Lines[i].Length; j++)
                    {
                        richTextBox.Select(charIndex + j, 1);
                        Color textColor = GetTextColorAtPosition(richTextBox, charIndex + j);
                        Font textFont = richTextBox.SelectionFont;

                        using (Brush brush = new SolidBrush(textColor))
                        {
                            // 폰트 크기를 최대 20으로 제한
                            float limitedFontSize = Math.Min(textFont.Size, 20);

                            using (Font font = new Font(textFont.FontFamily, limitedFontSize, textFont.Style))
                            {
                                // 각 글자에 대해 색상을 적용
                                RectangleF rect = new RectangleF(xOffset, yOffset, cellPixelSize + 20, limitedFontSize + 20);
                                StringFormat stringFormat = new StringFormat();
                                stringFormat.Alignment = StringAlignment.Center; // 가로 중앙 정렬
                                stringFormat.LineAlignment = StringAlignment.Near; // 세로 중앙 정렬을 맨 위에 위치하도록 변경

                                graphics.DrawString(richTextBox.Text[charIndex + j].ToString(), font, brush, rect, stringFormat);

                                xOffset += cellPixelSize + 5; // 다음 글자로 이동
                            }
                        }
                    }

                    // 다음 줄로 넘어갈 때 yOffset을 조절
                    yOffset += fontSize + 15;
                }
            }

            // 이미지를 파일로 저장
            string fileName = $"RichTextBoxImage_{DateTime.Now:yyyyMMdd_HHmmss}.png";
            bitmap.Save(fileName, System.Drawing.Imaging.ImageFormat.Png);

            MessageBox.Show($"이미지가 {fileName} 파일로 저장되었습니다.", "알림", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }


        private Color GetTextColorAtPosition(RichTextBox richTextBox, int charIndex)
        {
            richTextBox.Select(charIndex, 1);
            return richTextBox.SelectionColor;
        }


        private const int WM_USER = 0x400;
        private const int EM_FORMATRANGE = WM_USER + 57;

        [StructLayout(LayoutKind.Sequential)]
        private struct RECT
        {
            public int Left;
            public int Top;
            public int Right;
            public int Bottom;

            public RECT(int left, int top, int right, int bottom)
            {
                Left = left;
                Top = top;
                Right = right;
                Bottom = bottom;
            }
        }

        [StructLayout(LayoutKind.Sequential)]
        private struct FORMATRANGE
        {
            public IntPtr hdcTarget;
            public IntPtr hdc;
            public RECT rc;
            public RECT rcPage;
        }

        [DllImport("user32.dll")]
        private static extern IntPtr SendMessage(IntPtr hWnd, int msg, IntPtr wp, IntPtr lp);



    }
}