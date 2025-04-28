import java.io.*;
import java.nio.charset.StandardCharsets;

public class Ctecka {
    static void start() {

        try (BufferedReader br = new BufferedReader(new FileReader("textové dokumenty\\foo.txt", StandardCharsets.UTF_8))) {
            String line;
            while ((line = br.readLine()) != null) {
                System.out.println(line);
            }
        } catch (FileNotFoundException e) {
            throw new RuntimeException(e);
        } catch (IOException e) {
            throw new RuntimeException(e);
        }
    }
}
