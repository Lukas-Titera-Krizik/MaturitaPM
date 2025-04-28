public class Databaze {
    static Hrac hrac = new Hrac();
    static Zbran nic = new Zbran("-", 0, 0, 0, 0);
    static Zbran brokovnice = new Zbran("Brokovnice", 15, 85, 0, 100);
    static Zbran revolver = new Zbran("Revoler", 25, 80, 0, 150);
    static Zbran puska = new Zbran("Lovecká puška", 35, 85, 0, 200);
    static Zbran databazeZbrani[] = new Zbran[3];
    public static void vycistiObrazovku(){
        for (int i = 0; i < 50; ++i) System.out.println();
    }
}
