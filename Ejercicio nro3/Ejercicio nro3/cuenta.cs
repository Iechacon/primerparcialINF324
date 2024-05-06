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
    public partial class cuenta : Form
    {
        public cuenta()
        {
            InitializeComponent();
        }

        MySqlConnection con = new MySqlConnection("" + "server=localhost;user id=root;password=;" + "database=bd_banco; sslMode=none");
        MySqlCommand cmd;
        MySqlDataAdapter da;
        DataTable dt;
        string sql;
        string cuenta_id;
        int result;



        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void loadData()
        {
            try
            {
                sql = "SELECT CuentaBancaria.id, CuentaBancaria.numero_cuenta, CuentaBancaria.saldo, CuentaBancaria.tipo_cuenta, persona_id, Persona.nombre, Persona.apellido FROM CuentaBancaria INNER JOIN Persona ON CuentaBancaria.persona_id = Persona.id";
                con.Open();
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = sql;
                da = new MySqlDataAdapter();
                da.SelectCommand = cmd;
                dt = new DataTable();
                da.Fill(dt);
                dgvCuenta.DataSource = dt;

                textNumeroCuenta.Clear();
                textSaldo.Clear();
                textPersonaID.Clear();

                btneliminar.Enabled = false;
                btnactualizar.Enabled = false;
                btnguardar.Enabled = false;

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            finally
            {
                con.Close();
                da.Dispose();
            }
        }

        private void guardarDatos()
        {
            MySqlCommand cmd = new MySqlCommand();
            try
            {
                // Obtener el valor seleccionado del ComboBox
                string tipoCuenta = comboBoxTipoCuenta.SelectedItem.ToString();

                sql = "Insert into CuentaBancaria(numero_cuenta, saldo, tipo_cuenta, persona_id) values('" + textNumeroCuenta.Text + "','" + textSaldo.Text + "','" + tipoCuenta + "','" + textPersonaID.Text + "')";
                con.Open();
                cmd.Connection = con;
                cmd.CommandText = sql;
                result = cmd.ExecuteNonQuery();

                if (result > 0)
                {
                    MessageBox.Show("Guardado con éxito", "Guardado");
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

        private void actualizarDatos()
        {
            MySqlCommand cmd = new MySqlCommand();
            try
            {
                // Obtener el valor seleccionado del ComboBox
                string tipoCuenta = comboBoxTipoCuenta.SelectedItem.ToString();

                sql = "Update CuentaBancaria Set numero_cuenta='" + textNumeroCuenta.Text + "', saldo='"
                    + textSaldo.Text + "', tipo_cuenta='" + tipoCuenta + "', persona_id='" + textPersonaID.Text
                    + "' Where " + "id=" + cuenta_id;
                con.Open();
                cmd.Connection = con;
                cmd.CommandText = sql;
                result = cmd.ExecuteNonQuery();

                if (result > 0)
                {
                    MessageBox.Show("Actualizado con éxito", "Actualizado");
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

        private void eliminarDatos()
        {
            try
            {
                sql = "DELETE FROM CuentaBancaria WHERE id=" + cuenta_id;
                con.Open();
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = sql;
                result = cmd.ExecuteNonQuery();

                if (result > 0)
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

        private void btnguardar_Click(object sender, EventArgs e)
        {
            guardarDatos();
            loadData();
        }

        private void btnrecuperar_Click(object sender, EventArgs e)
        {
            loadData();
        }
        private void btnrecuperar_Click_1(object sender, EventArgs e)
        {
            loadData();
        }

        private void btnactualizar_Click(object sender, EventArgs e)
        {
            actualizarDatos();
            loadData();
        }
        private void btnactualizar_Click_1(object sender, EventArgs e)
        {
            actualizarDatos();
            loadData();
        }

        private void btneliminar_Click(object sender, EventArgs e)
        {
            eliminarDatos();
            loadData();
        }
        private void dgvCuenta_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dgvCuenta_Click(object sender, EventArgs e)
        {
            cuenta_id = dgvCuenta.CurrentRow.Cells[0].Value.ToString();
            textNumeroCuenta.Text = dgvCuenta.CurrentRow.Cells[1].Value.ToString();
            textSaldo.Text = dgvCuenta.CurrentRow.Cells[2].Value.ToString();
            comboBoxTipoCuenta.Text = dgvCuenta.CurrentRow.Cells[3].Value.ToString();
            textPersonaID.Text = dgvCuenta.CurrentRow.Cells[4].Value.ToString();

            btneliminar.Enabled = true;
            btnactualizar.Enabled = true;
            btnguardar.Enabled = false;
        }



        private void button1_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void dgvCuenta_Click_1(object sender, EventArgs e)
        {
            cuenta_id = dgvCuenta.CurrentRow.Cells[0].Value.ToString();
            textNumeroCuenta.Text = dgvCuenta.CurrentRow.Cells[1].Value.ToString();
            textSaldo.Text = dgvCuenta.CurrentRow.Cells[2].Value.ToString();
            comboBoxTipoCuenta.Text = dgvCuenta.CurrentRow.Cells[3].Value.ToString();
            textPersonaID.Text = dgvCuenta.CurrentRow.Cells[4].Value.ToString();

            btneliminar.Enabled = true;
            btnactualizar.Enabled = true;
            btnguardar.Enabled = true;
        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            comboBoxTipoCuenta.Items.Add("Ahorros");
            comboBoxTipoCuenta.Items.Add("Corriente");
            comboBoxTipoCuenta.Items.Add("Inversion");
        }

    }
}