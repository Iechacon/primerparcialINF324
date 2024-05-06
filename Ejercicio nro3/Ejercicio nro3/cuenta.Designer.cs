namespace Ejercicio_nro3
{
    partial class cuenta
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.button1 = new System.Windows.Forms.Button();
            this.btneliminar = new System.Windows.Forms.Button();
            this.btnactualizar = new System.Windows.Forms.Button();
            this.btnrecuperar = new System.Windows.Forms.Button();
            this.dgvCuenta = new System.Windows.Forms.DataGridView();
            this.btnguardar = new System.Windows.Forms.Button();
            this.textSaldo = new System.Windows.Forms.TextBox();
            this.textNumeroCuenta = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.textPersonaID = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.comboBoxTipoCuenta = new System.Windows.Forms.ComboBox();
            ((System.ComponentModel.ISupportInitialize)(this.dgvCuenta)).BeginInit();
            this.SuspendLayout();
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(672, 46);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(119, 31);
            this.button1.TabIndex = 25;
            this.button1.Text = "Volver al inicio";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // btneliminar
            // 
            this.btneliminar.Location = new System.Drawing.Point(553, 104);
            this.btneliminar.Name = "btneliminar";
            this.btneliminar.Size = new System.Drawing.Size(75, 23);
            this.btneliminar.TabIndex = 24;
            this.btneliminar.Text = "Eliminar";
            this.btneliminar.UseVisualStyleBackColor = true;
            this.btneliminar.Click += new System.EventHandler(this.btneliminar_Click);
            // 
            // btnactualizar
            // 
            this.btnactualizar.Location = new System.Drawing.Point(553, 75);
            this.btnactualizar.Name = "btnactualizar";
            this.btnactualizar.Size = new System.Drawing.Size(75, 23);
            this.btnactualizar.TabIndex = 23;
            this.btnactualizar.Text = "Actualizar";
            this.btnactualizar.UseVisualStyleBackColor = true;
            this.btnactualizar.Click += new System.EventHandler(this.btnactualizar_Click_1);
            // 
            // btnrecuperar
            // 
            this.btnrecuperar.Location = new System.Drawing.Point(553, 50);
            this.btnrecuperar.Name = "btnrecuperar";
            this.btnrecuperar.Size = new System.Drawing.Size(75, 23);
            this.btnrecuperar.TabIndex = 22;
            this.btnrecuperar.Text = "Recuperar";
            this.btnrecuperar.UseVisualStyleBackColor = true;
            this.btnrecuperar.Click += new System.EventHandler(this.btnrecuperar_Click_1);
            // 
            // dgvCuenta
            // 
            this.dgvCuenta.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvCuenta.Location = new System.Drawing.Point(20, 142);
            this.dgvCuenta.Name = "dgvCuenta";
            this.dgvCuenta.Size = new System.Drawing.Size(716, 274);
            this.dgvCuenta.TabIndex = 21;
            this.dgvCuenta.Click += new System.EventHandler(this.dgvCuenta_Click_1);
            // 
            // btnguardar
            // 
            this.btnguardar.Location = new System.Drawing.Point(553, 23);
            this.btnguardar.Name = "btnguardar";
            this.btnguardar.Size = new System.Drawing.Size(75, 23);
            this.btnguardar.TabIndex = 20;
            this.btnguardar.Text = "Guardar";
            this.btnguardar.UseVisualStyleBackColor = true;
            this.btnguardar.Click += new System.EventHandler(this.btnguardar_Click);
            // 
            // textSaldo
            // 
            this.textSaldo.Location = new System.Drawing.Point(121, 51);
            this.textSaldo.Name = "textSaldo";
            this.textSaldo.Size = new System.Drawing.Size(343, 20);
            this.textSaldo.TabIndex = 18;
            // 
            // textNumeroCuenta
            // 
            this.textNumeroCuenta.Location = new System.Drawing.Point(121, 25);
            this.textNumeroCuenta.Name = "textNumeroCuenta";
            this.textNumeroCuenta.Size = new System.Drawing.Size(343, 20);
            this.textNumeroCuenta.TabIndex = 17;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(403, 126);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(0, 13);
            this.label4.TabIndex = 16;
            // 
            // label3
            // 
            this.label3.Location = new System.Drawing.Point(0, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(100, 23);
            this.label3.TabIndex = 28;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(17, 55);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(37, 13);
            this.label2.TabIndex = 14;
            this.label2.Text = "Saldo:";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(17, 28);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(98, 13);
            this.label1.TabIndex = 13;
            this.label1.Text = "Numero de cuenta:";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(17, 104);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(63, 13);
            this.label5.TabIndex = 26;
            this.label5.Text = "Persona ID:";
            // 
            // textPersonaID
            // 
            this.textPersonaID.Location = new System.Drawing.Point(121, 104);
            this.textPersonaID.Name = "textPersonaID";
            this.textPersonaID.Size = new System.Drawing.Size(343, 20);
            this.textPersonaID.TabIndex = 27;
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(17, 84);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(82, 13);
            this.label6.TabIndex = 29;
            this.label6.Text = "Tipo de cuenta:";
            this.label6.Click += new System.EventHandler(this.label6_Click);
            // 
            // comboBoxTipoCuenta
            // 
            this.comboBoxTipoCuenta.FormattingEnabled = true;
            this.comboBoxTipoCuenta.Items.AddRange(new object[] {
            "Ahorros",
            "Inversión",
            "Corriente"});
            this.comboBoxTipoCuenta.Location = new System.Drawing.Point(121, 77);
            this.comboBoxTipoCuenta.Name = "comboBoxTipoCuenta";
            this.comboBoxTipoCuenta.Size = new System.Drawing.Size(343, 21);
            this.comboBoxTipoCuenta.TabIndex = 30;
            this.comboBoxTipoCuenta.SelectedIndexChanged += new System.EventHandler(this.comboBox1_SelectedIndexChanged);
            // 
            // cuenta
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(909, 438);
            this.Controls.Add(this.comboBoxTipoCuenta);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.textPersonaID);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.btneliminar);
            this.Controls.Add(this.btnactualizar);
            this.Controls.Add(this.btnrecuperar);
            this.Controls.Add(this.dgvCuenta);
            this.Controls.Add(this.btnguardar);
            this.Controls.Add(this.textSaldo);
            this.Controls.Add(this.textNumeroCuenta);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Name = "cuenta";
            this.Text = "cuenta";
            ((System.ComponentModel.ISupportInitialize)(this.dgvCuenta)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button btneliminar;
        private System.Windows.Forms.Button btnactualizar;
        private System.Windows.Forms.Button btnrecuperar;
        private System.Windows.Forms.DataGridView dgvCuenta;
        private System.Windows.Forms.Button btnguardar;
        private System.Windows.Forms.TextBox textSaldo;
        private System.Windows.Forms.TextBox textNumeroCuenta;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox textPersonaID;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.ComboBox comboBoxTipoCuenta;
    }
}