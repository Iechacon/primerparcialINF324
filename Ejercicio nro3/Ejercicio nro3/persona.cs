using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace Ejercicio_nro3
{
    public partial class persona : Form
    {
        public persona()
        {
            InitializeComponent();
        }
        MySqlConnection con = new MySqlConnection(""+"server=localhost;user id=root;password=;"+"database=bd_banco; sslMode=none");
        MySqlCommand cmd;
        MySqlDataAdapter da;
        DataTable dt;
        string sql;
        string personaid;
        int resulta;

        private void loadData() {
            try
            {
                sql = "Select id, nombre, apellido" + ",direccion from persona";
                con.Open();
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = sql;
                da = new MySqlDataAdapter();
                da.SelectCommand = cmd;
                dt = new DataTable();
                da.Fill(dt);
                dgvpersona.DataSource = dt;

                textapellido.Clear();
                textnombre.Clear();
                textdireccion.Clear();

                btneliminar.Enabled = false;
                btnactualizar.Enabled = false;
                btnguardar.Enabled = false;

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            finally {
                con.Close();
                da.Dispose();
            }
        }

        private void guardarDatos()
        {
            MySqlCommand cmd = new MySqlCommand(); // Aquí inicializamos cmd
            try
            {
                sql = "Insert into persona(nombre, apellido, direccion) values(" + "'" + textnombre.Text + "','" + textapellido.Text + "',"
                    + "'" + textdireccion.Text + "')";
                con.Open();
                cmd.Connection = con;
                cmd.CommandText = sql;
                resulta = cmd.ExecuteNonQuery();

                if (resulta > 0)
                {
                    MessageBox.Show("Guardado con éxito", "Guardado");
                }
                else
                {
                    MessageBox.Show("falló la ejecución", "Error");
                }

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            finally
            {
                con.Close();
            }
        }


        private void actualizarDatos()
        {
            MySqlCommand cmd = new MySqlCommand(); // Inicializamos cmd
            try
            {
                sql = "Update persona set nombre ='" + textnombre.Text + "', Apellido='" + textapellido.Text
                    + "', direccion='" + textdireccion.Text + "' Where " + "id=" + personaid;
                con.Open();
                cmd.Connection = con;
                cmd.CommandText = sql;
                resulta = cmd.ExecuteNonQuery();

                if (resulta > 0)
                {
                    MessageBox.Show("Guardado con éxito", "Guardado");
                }
                else
                {
                    MessageBox.Show("falló la ejecución", "Error");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            finally
            {
                con.Close(); // Cerramos la conexión aquí en el finally
            }
        }


        private void eliminarDatos() {
            try {
                sql = "Delete from persona Where id=" + personaid;
                con.Open();
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = sql;
                resulta = cmd.ExecuteNonQuery();

                if (resulta > 0)
                {
                    MessageBox.Show("Eliminado con éxito", "Eliminado");
                }
                else
                {
                    MessageBox.Show("Falló la ejecución", "Error");
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            finally
            {
                con.Close();
            }
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void btnguardar_Click(object sender, EventArgs e)
        {
            guardarDatos();
            loadData();
        }

        private void btnrecuperar_Click(object sender, EventArgs e)
        {
            loadData();
        }

        private void btnactualizar_Click(object sender, EventArgs e)
        {
            actualizarDatos();
            loadData();
        }

        private void btneliminar_Click(object sender, EventArgs e)
        {
            eliminarDatos();
            loadData();
        }

        private void dgvpersona_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dgvpersona_Click(object sender, EventArgs e)
        {
            personaid = dgvpersona.CurrentRow.Cells[0].Value.ToString();
            textnombre.Text = dgvpersona.CurrentRow.Cells[1].Value.ToString();
            textapellido.Text = dgvpersona.CurrentRow.Cells[2].Value.ToString();
            textdireccion.Text = dgvpersona.CurrentRow.Cells[3].Value.ToString();

            btneliminar.Enabled = true;
            btnactualizar.Enabled = true;
            btnguardar.Enabled = true;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Close();
        }


    }
}
