namespace videoPlay
{
    partial class Form1
    {
        /// <summary>
        /// 필수 디자이너 변수입니다.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// 사용 중인 모든 리소스를 정리합니다.
        /// </summary>
        /// <param name="disposing">관리되는 리소스를 삭제해야 하면 true이고, 그렇지 않으면 false입니다.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form 디자이너에서 생성한 코드

        /// <summary>
        /// 디자이너 지원에 필요한 메서드입니다. 
        /// 이 메서드의 내용을 코드 편집기로 수정하지 마세요.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.comboBox1 = new System.Windows.Forms.ComboBox();
            this.comboBox2 = new System.Windows.Forms.ComboBox();
            this.listView1 = new System.Windows.Forms.ListView();
            this.button1 = new System.Windows.Forms.Button();
            this.button3 = new System.Windows.Forms.Button();
            this.button4 = new System.Windows.Forms.Button();
            this.panel1 = new System.Windows.Forms.Panel();
            this.button6 = new System.Windows.Forms.Button();
            this.button5 = new System.Windows.Forms.Button();
            this.label10 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.comboBox6 = new System.Windows.Forms.ComboBox();
            this.comboBox5 = new System.Windows.Forms.ComboBox();
            this.comboBox4 = new System.Windows.Forms.ComboBox();
            this.comboBox3 = new System.Windows.Forms.ComboBox();
            this.label6 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.dateTimePicker1 = new System.Windows.Forms.DateTimePicker();
            this.dateTimePicker2 = new System.Windows.Forms.DateTimePicker();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.label11 = new System.Windows.Forms.Label();
            this.label12 = new System.Windows.Forms.Label();
            this.richTextBox1 = new System.Windows.Forms.RichTextBox();
            this.makeImg = new System.Windows.Forms.Button();
            this.axWindowsMediaPlayer1 = new AxWMPLib.AxWindowsMediaPlayer();
            this.panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.axWindowsMediaPlayer1)).BeginInit();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.Location = new System.Drawing.Point(1111, 152);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(112, 49);
            this.label1.TabIndex = 1;
            this.label1.Text = "열";
            // 
            // label2
            // 
            this.label2.Location = new System.Drawing.Point(1111, 204);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(112, 49);
            this.label2.TabIndex = 2;
            this.label2.Text = "단";
            // 
            // comboBox1
            // 
            this.comboBox1.FormattingEnabled = true;
            this.comboBox1.Location = new System.Drawing.Point(1162, 149);
            this.comboBox1.Name = "comboBox1";
            this.comboBox1.Size = new System.Drawing.Size(97, 20);
            this.comboBox1.TabIndex = 3;
            // 
            // comboBox2
            // 
            this.comboBox2.FormattingEnabled = true;
            this.comboBox2.Location = new System.Drawing.Point(1162, 204);
            this.comboBox2.Name = "comboBox2";
            this.comboBox2.Size = new System.Drawing.Size(97, 20);
            this.comboBox2.TabIndex = 4;
            // 
            // listView1
            // 
            this.listView1.HideSelection = false;
            this.listView1.Location = new System.Drawing.Point(53, 333);
            this.listView1.Name = "listView1";
            this.listView1.Size = new System.Drawing.Size(904, 197);
            this.listView1.TabIndex = 5;
            this.listView1.UseCompatibleStateImageBehavior = false;
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(986, 490);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(97, 41);
            this.button1.TabIndex = 6;
            this.button1.Text = "종료";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // button3
            // 
            this.button3.Location = new System.Drawing.Point(986, 409);
            this.button3.Name = "button3";
            this.button3.Size = new System.Drawing.Size(97, 41);
            this.button3.TabIndex = 8;
            this.button3.Text = "적용";
            this.button3.UseVisualStyleBackColor = true;
            this.button3.Click += new System.EventHandler(this.button3_Click);
            // 
            // button4
            // 
            this.button4.Location = new System.Drawing.Point(986, 333);
            this.button4.Name = "button4";
            this.button4.Size = new System.Drawing.Size(97, 41);
            this.button4.TabIndex = 9;
            this.button4.Text = "추가";
            this.button4.UseVisualStyleBackColor = true;
            this.button4.Click += new System.EventHandler(this.button4_Click);
            // 
            // panel1
            // 
            this.panel1.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panel1.Controls.Add(this.button6);
            this.panel1.Controls.Add(this.button5);
            this.panel1.Controls.Add(this.label10);
            this.panel1.Controls.Add(this.label9);
            this.panel1.Controls.Add(this.label8);
            this.panel1.Controls.Add(this.label7);
            this.panel1.Controls.Add(this.comboBox6);
            this.panel1.Controls.Add(this.comboBox5);
            this.panel1.Controls.Add(this.comboBox4);
            this.panel1.Controls.Add(this.comboBox3);
            this.panel1.Controls.Add(this.label6);
            this.panel1.Controls.Add(this.label5);
            this.panel1.Controls.Add(this.label4);
            this.panel1.Controls.Add(this.label3);
            this.panel1.Controls.Add(this.dateTimePicker1);
            this.panel1.Controls.Add(this.dateTimePicker2);
            this.panel1.Location = new System.Drawing.Point(470, 207);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(421, 345);
            this.panel1.TabIndex = 10;
            this.panel1.Visible = false;
            // 
            // button6
            // 
            this.button6.Location = new System.Drawing.Point(271, 257);
            this.button6.Name = "button6";
            this.button6.Size = new System.Drawing.Size(97, 41);
            this.button6.TabIndex = 84;
            this.button6.Text = "취소";
            this.button6.UseVisualStyleBackColor = true;
            this.button6.Click += new System.EventHandler(this.button6_Click);
            // 
            // button5
            // 
            this.button5.Location = new System.Drawing.Point(168, 257);
            this.button5.Name = "button5";
            this.button5.Size = new System.Drawing.Size(97, 41);
            this.button5.TabIndex = 83;
            this.button5.Text = "파일등록";
            this.button5.UseVisualStyleBackColor = true;
            this.button5.Click += new System.EventHandler(this.button5_Click);
            // 
            // label10
            // 
            this.label10.Location = new System.Drawing.Point(372, 192);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(33, 20);
            this.label10.TabIndex = 82;
            this.label10.Text = "분";
            // 
            // label9
            // 
            this.label9.Location = new System.Drawing.Point(372, 155);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(33, 20);
            this.label9.TabIndex = 81;
            this.label9.Text = "분";
            // 
            // label8
            // 
            this.label8.Location = new System.Drawing.Point(232, 191);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(33, 20);
            this.label8.TabIndex = 80;
            this.label8.Text = "시";
            // 
            // label7
            // 
            this.label7.Location = new System.Drawing.Point(232, 155);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(33, 20);
            this.label7.TabIndex = 79;
            this.label7.Text = "시";
            // 
            // comboBox6
            // 
            this.comboBox6.FormattingEnabled = true;
            this.comboBox6.Location = new System.Drawing.Point(271, 188);
            this.comboBox6.Name = "comboBox6";
            this.comboBox6.Size = new System.Drawing.Size(97, 20);
            this.comboBox6.TabIndex = 78;
            // 
            // comboBox5
            // 
            this.comboBox5.FormattingEnabled = true;
            this.comboBox5.Location = new System.Drawing.Point(129, 188);
            this.comboBox5.Name = "comboBox5";
            this.comboBox5.Size = new System.Drawing.Size(97, 20);
            this.comboBox5.TabIndex = 77;
            // 
            // comboBox4
            // 
            this.comboBox4.FormattingEnabled = true;
            this.comboBox4.Location = new System.Drawing.Point(271, 152);
            this.comboBox4.Name = "comboBox4";
            this.comboBox4.Size = new System.Drawing.Size(97, 20);
            this.comboBox4.TabIndex = 76;
            // 
            // comboBox3
            // 
            this.comboBox3.FormattingEnabled = true;
            this.comboBox3.Location = new System.Drawing.Point(129, 152);
            this.comboBox3.Name = "comboBox3";
            this.comboBox3.Size = new System.Drawing.Size(97, 20);
            this.comboBox3.TabIndex = 75;
            // 
            // label6
            // 
            this.label6.Location = new System.Drawing.Point(26, 191);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(83, 37);
            this.label6.TabIndex = 74;
            this.label6.Text = "종료시간";
            // 
            // label5
            // 
            this.label5.Location = new System.Drawing.Point(26, 155);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(83, 37);
            this.label5.TabIndex = 73;
            this.label5.Text = "시작시간";
            // 
            // label4
            // 
            this.label4.Location = new System.Drawing.Point(26, 97);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(83, 37);
            this.label4.TabIndex = 72;
            this.label4.Text = "종료일자";
            // 
            // label3
            // 
            this.label3.Location = new System.Drawing.Point(26, 36);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(83, 37);
            this.label3.TabIndex = 71;
            this.label3.Text = "시작일자";
            // 
            // dateTimePicker1
            // 
            this.dateTimePicker1.Font = new System.Drawing.Font("굴림", 22F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.dateTimePicker1.Location = new System.Drawing.Point(129, 84);
            this.dateTimePicker1.Name = "dateTimePicker1";
            this.dateTimePicker1.Size = new System.Drawing.Size(262, 41);
            this.dateTimePicker1.TabIndex = 70;
            // 
            // dateTimePicker2
            // 
            this.dateTimePicker2.Font = new System.Drawing.Font("굴림", 22F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.dateTimePicker2.Location = new System.Drawing.Point(129, 21);
            this.dateTimePicker2.Name = "dateTimePicker2";
            this.dateTimePicker2.Size = new System.Drawing.Size(262, 41);
            this.dateTimePicker2.TabIndex = 69;
            // 
            // pictureBox1
            // 
            this.pictureBox1.Location = new System.Drawing.Point(0, 0);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(525, 256);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.pictureBox1.TabIndex = 11;
            this.pictureBox1.TabStop = false;
            this.pictureBox1.Visible = false;
            // 
            // label11
            // 
            this.label11.Location = new System.Drawing.Point(51, 592);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(216, 46);
            this.label11.TabIndex = 12;
            this.label11.Text = "label11";
            // 
            // label12
            // 
            this.label12.Location = new System.Drawing.Point(206, 564);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(478, 99);
            this.label12.TabIndex = 13;
            // 
            // richTextBox1
            // 
            this.richTextBox1.AcceptsTab = true;
            this.richTextBox1.BackColor = System.Drawing.Color.Black;
            this.richTextBox1.DetectUrls = false;
            this.richTextBox1.Font = new System.Drawing.Font("굴림", 15F, System.Drawing.FontStyle.Bold);
            this.richTextBox1.ForeColor = System.Drawing.Color.White;
            this.richTextBox1.Location = new System.Drawing.Point(558, 0);
            this.richTextBox1.Name = "richTextBox1";
            this.richTextBox1.Size = new System.Drawing.Size(525, 256);
            this.richTextBox1.TabIndex = 14;
            this.richTextBox1.Text = "";
            this.richTextBox1.Enter += new System.EventHandler(this.richTextBox1_Enter);
            this.richTextBox1.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.richTextBox1_KeyPress);
            this.richTextBox1.Leave += new System.EventHandler(this.richTextBox1_Leave);
            this.richTextBox1.MouseUp += new System.Windows.Forms.MouseEventHandler(this.richTextBox1_MouseUp);
            // 
            // makeImg
            // 
            this.makeImg.Location = new System.Drawing.Point(986, 273);
            this.makeImg.Name = "makeImg";
            this.makeImg.Size = new System.Drawing.Size(97, 41);
            this.makeImg.TabIndex = 15;
            this.makeImg.Text = "이미지만들기";
            this.makeImg.UseVisualStyleBackColor = true;
            this.makeImg.Click += new System.EventHandler(this.makeImg_Click);
            // 
            // axWindowsMediaPlayer1
            // 
            this.axWindowsMediaPlayer1.Enabled = true;
            this.axWindowsMediaPlayer1.Location = new System.Drawing.Point(0, 0);
            this.axWindowsMediaPlayer1.Name = "axWindowsMediaPlayer1";
            this.axWindowsMediaPlayer1.OcxState = ((System.Windows.Forms.AxHost.State)(resources.GetObject("axWindowsMediaPlayer1.OcxState")));
            this.axWindowsMediaPlayer1.Size = new System.Drawing.Size(525, 256);
            this.axWindowsMediaPlayer1.TabIndex = 0;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 12F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1283, 672);
            this.ControlBox = false;
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.makeImg);
            this.Controls.Add(this.richTextBox1);
            this.Controls.Add(this.label12);
            this.Controls.Add(this.label11);
            this.Controls.Add(this.axWindowsMediaPlayer1);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.button4);
            this.Controls.Add(this.button3);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.listView1);
            this.Controls.Add(this.comboBox2);
            this.Controls.Add(this.comboBox1);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "Form1";
            this.panel1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.axWindowsMediaPlayer1)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private AxWMPLib.AxWindowsMediaPlayer axWindowsMediaPlayer1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.ComboBox comboBox1;
        private System.Windows.Forms.ComboBox comboBox2;
        private System.Windows.Forms.ListView listView1;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button button3;
        private System.Windows.Forms.Button button4;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.DateTimePicker dateTimePicker1;
        private System.Windows.Forms.DateTimePicker dateTimePicker2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.ComboBox comboBox6;
        private System.Windows.Forms.ComboBox comboBox5;
        private System.Windows.Forms.ComboBox comboBox4;
        private System.Windows.Forms.ComboBox comboBox3;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Button button6;
        private System.Windows.Forms.Button button5;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.RichTextBox richTextBox1;
        private System.Windows.Forms.Button makeImg;
    }
}

