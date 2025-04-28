import java.util.Random;
public class Protivnik{
    String jmeno;
    int utocnaSila;
    int zdravi;
    int presnost;
    boolean stav = true; //1 = naživu, 0 = mrvtí
    String [] randomJmena = {"Zmutovaný vlk", "Zmutovaný divočák", "Bludička", "Lesní běs", "Ztracenec"};
    public Protivnik(String jmeno, int utocnaSila, int zivoty, int presnostUtoku){
        this.jmeno = jmeno;
        this.utocnaSila = utocnaSila;
        this.zdravi = zivoty;
        this.presnost = presnostUtoku;
    }
    public Protivnik(){
        Random nahoda = new Random();
        this.jmeno = randomJmena[nahoda.nextInt(4)];
        this.utocnaSila = nahoda.nextInt(20) + 10;
        this.zdravi = nahoda.nextInt(50) + 50;
        this.presnost = nahoda.nextInt(40) + 60;
    }
}
