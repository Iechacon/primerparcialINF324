import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Main {
    public static void main(String[] args) {
        try {
            // Establecer la URL del script PHP
            URL url = new URL("http://localhost/ejercicio4/form.php");
            
            // Abrir la conexión
            HttpURLConnection con = (HttpURLConnection) url.openConnection();

            // Establecer el método de solicitud
            con.setRequestMethod("GET");

            // Leer la respuesta del servidor
            BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
            String inputLine;
            StringBuffer response = new StringBuffer();
            while ((inputLine = in.readLine()) != null) {
                response.append(inputLine);
            }
            in.close();

            // Imprimir la respuesta del servidor
            System.out.println("Respuesta del servidor:");
            System.out.println(response.toString());

            // Cerrar la conexión
            con.disconnect();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
