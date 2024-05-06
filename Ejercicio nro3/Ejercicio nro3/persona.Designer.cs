namespace Ejercicio_nro3
{
    partial class persona
    {
        /// <summary>
        /// Variable del diseñador requerida.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpiar los recursos que se estén utilizando.
        /// </summary>
        /// <param name="disposing">true si los recursos administrados se deben eliminar; false en caso contrario.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código generado por el Diseñador de Windows Forms

        /// <summary>
        /// Método necesario para admitir el Diseñador. No se puede modificar
        /// el contenido del método con el editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.textnombre = new System.Windows.Forms.TextBox();
            this.textapellido = new System.Windows.Forms.TextBox();
            this.textdireccion = new System.Windows.Forms.TextBox();
            this.btnguardar = new System.Windows.Forms.Button();
            this.dgvpersona = new System.Windows.Forms.DataGridView();
            this.btnrecuperar = new System.Windows.Forms.Button();
            this.btnactualizar = new System.Windows.Forms.Button();
            this.btneliminar = new System.Windows.Forms.Button();
            this.button1 = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvpersona)).BeginInit();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(13, 13);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(47, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "Nombre:";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(13, 40);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(47, 13);
            this.label2.TabIndex = 1;
            this.label2.Text = "Apellido:";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(13, 66);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(55, 13);
            this.label3.TabIndex = 2;
            this.label3.Text = "Dirección:";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(366, 111);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(0, 13);
            this.label4.TabIndex = 3;
            // 
            // textnombre
            // 
            this.textnombre.Location = new System.Drawing.Point(84, 10);
            this.textnombre.Name = "textnombre";
            this.textnombre.Size = new System.Drawing.Size(343, 20);
            this.textnombre.TabIndex = 4;
            // 
            // textapellido
            // 
            this.textapellido.Location = new System.Drawing.Point(84, 36);
            this.textapellido.Name = "textapellido";
            this.textapellido.Size = new System.Drawing.Size(343, 20);
            this.textapellido.TabIndex = 5;
            // 
            // textdireccion
            // 
            this.textdireccion.Location = new System.Drawing.Point(84, 62);
            this.textdireccion.Name = "textdireccion";
            this.textdireccion.Size = new System.Drawing.Size(343, 20);
            this.textdireccion.TabIndex = 6;
            // 
            // btnguardar
            // 
            this.btnguardar.Location = new System.Drawing.Point(433, 8);
            this.btnguardar.Name = "btnguardar";
            this.btnguardar.Size = new System.Drawing.Size(75, 23);
            this.btnguardar.TabIndex = 7;
            this.btnguardar.Text = "Guardar";
            this.btnguardar.UseVisualStyleBackColor = true;
            this.btnguardar.Click += new System.EventHandler(this.btnguardar_Click);
            // 
            // dgvpersona
            // 
            this.dgvpersona.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvpersona.Location = new System.Drawing.Point(16, 137);
            this.dgvpersona.Name = "dgvpersona";
            this.dgvpersona.Size = new System.Drawing.Size(471, 248);
            this.dgvpersona.TabIndex = 8;
            this.dgvpersona.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvpersona_CellContentClick);
            this.dgvpersona.Click += new System.EventHandler(this.dgvpersona_Click);
            // 
            // btnrecuperar
            // 
            this.btnrecuperar.Location = new System.Drawing.Point(433, 35);
            this.btnrecuperar.Name = "btnrecuperar";
            this.btnrecuperar.Size = new System.Drawing.Size(75, 23);
            this.btnrecuperar.TabIndex = 9;
            this.btnrecuperar.Text = "Recuperar";
            this.btnrecuperar.UseVisualStyleBackColor = true;
            this.btnrecuperar.Click += new System.EventHandler(this.btnrecuperar_Click);
            // 
            // btnactualizar
            // 
            this.btnactualizar.Location = new System.Drawing.Point(433, 60);
            this.btnactualizar.Name = "btnactualizar";
            this.btnactualizar.Size = new System.Drawing.Size(75, 23);
            this.btnactualizar.TabIndex = 10;
            this.btnactualizar.Text = "Actualizar";
            this.btnactualizar.UseVisualStyleBackColor = true;
            this.btnactualizar.Click += new System.EventHandler(this.btnactualizar_Click);
            // 
            // btneliminar
            // 
            this.btneliminar.Location = new System.Drawing.Point(433, 89);
            this.btneliminar.Name = "btneliminar";
            this.btneliminar.Size = new System.Drawing.Size(75, 23);
            this.btneliminar.TabIndex = 11;
            this.btneliminar.Text = "Eliminar";
            this.btneliminar.UseVisualStyleBackColor = true;
            this.btneliminar.Click += new System.EventHandler(this.btneliminar_Click);
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(516, 354);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(119, 31);
            this.button1.TabIndex = 12;
            this.button1.Text = "Volver al inicio";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // persona
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(687, 413);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.btneliminar);
            this.Controls.Add(this.btnactualizar);
            this.Controls.Add(this.btnrecuperar);
            this.Controls.Add(this.dgvpersona);
            this.Controls.Add(this.btnguardar);
            this.Controls.Add(this.textdireccion);
            this.Controls.Add(this.textapellido);
            this.Controls.Add(this.textnombre);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Name = "persona";
            this.Text = "Form1";
            ((System.ComponentModel.ISupportInitialize)(this.dgvpersona)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox textnombre;
        private System.Windows.Forms.TextBox textapellido;
        private System.Windows.Forms.TextBox textdireccion;
        private System.Windows.Forms.Button btnguardar;
        private System.Windows.Forms.DataGridView dgvpersona;
        private System.Windows.Forms.Button btnrecuperar;
        private System.Windows.Forms.Button btnactualizar;
        private System.Windows.Forms.Button btneliminar;
        private System.Windows.Forms.Button button1;
    }
}

