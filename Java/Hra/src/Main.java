import java.io.IOException;

public class Main {
    public static void main(String[] args) {
        for(int i = 0; i<3; i++){
            Databaze.hrac.hracovaZbran[i] = Databaze.nic;
        }
        Databaze.databazeZbrani[0] = Databaze.brokovnice;
        Databaze.databazeZbrani[1] = Databaze.revolver;
        Databaze.databazeZbrani[2] = Databaze.puska;
        Databaze.hrac.hracovaZbran[0] = Databaze.brokovnice;
        
        Udalosti.rozcesti();

    }
}