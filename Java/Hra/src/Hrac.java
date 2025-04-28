import javax.xml.crypto.Data;
import java.util.concurrent.TimeUnit;

public class Hrac{
    public int penize = 200;
    public int zdravi = 100;
    public int zdraviMax = 100;
    public int energie = 100;
    public int energieMax = 100;
    public int energyPiti = 2;
    public int zdraviPiti = 2;
    /*
    0 = nikdo
    1 = Joe
    2 = Frank
    3 = Becca
    4 = Betty
    */
    public int lokace = 0;
    /*
    0 = nikde
    1 = dům
    2 = Frankova benzinka
    3 = les
    4 = opuštěná laboratoř
    */
    public String jmeno;
    boolean stav = true; //1 = naživu, 0 = mrvtí
    public int zbranVRuce = 0;
    public Zbran hracovaZbran[] = new Zbran[3];
    public Hrac(){
        System.out.println("""
                
                ???: Nazdar Kluku! Vypadá to, že tě mám tenhle tejden na starost. Jak se jmenuješ?
                """);
        java.util.Scanner vstup = new java.util.Scanner(System.in);
        String input = vstup.nextLine();
        this.jmeno = input;
        try {
            TimeUnit.SECONDS.sleep(1);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println("""
                
                Joe: Těší mě, já jsem Joe, místní farmář. Slyšel jsem, že sis jsem přišel vydělat
                na lístek na Ceres.
                """);
        try {
            TimeUnit.SECONDS.sleep(2);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println(this.jmeno + ": Je to tak, za pár dnů odlítá poslední raketoplán tenhle rok.");
        try {
            TimeUnit.SECONDS.sleep(2);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println("""
                
                Joe: To máš stěstí, my tu máme pár lidí co jsou ochotný zaplatit i zlatem když
                jim seženeš co chceš.
                """);
        try {
            TimeUnit.SECONDS.sleep(2);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println(this.jmeno + ": Jako kdo?");
        try {
            TimeUnit.SECONDS.sleep(1);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println("""
                
                Joe: Kousek odsud je les ve, kterym najdeš určitě něco cennýho co Frank místní obhcodník
                zařadí mezi svoje "artefakty" a pak mám annonymní typ na pár dokumentů v opuštěný
                laboratoři BioTechu nedaleko odsud, pokud najdeš odvahu se tam vydat, tak mi pak ty
                dokumenty přines a já se postaráma aby skončili ve správných rukou. Ale pokud se někdo
                bude ptát tak ode mě nic nevíš.
                """);
        try {
            TimeUnit.SECONDS.sleep(3);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println(this.jmeno + ": Docela mi věříte na to, že tu jsem první den.");
        try {
            TimeUnit.SECONDS.sleep(1);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println("""
                
                Joe: Nemám důvod vás nováčky podezírat, většina stejně nemá v zájmu tady zůstat dýl něž
                pár dní a ocení při tom každou pomoc, a co se mě týká, mě už tady stejně moc času nezbývá.
                """);
        try {
            TimeUnit.SECONDS.sleep(2);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println("""
                
                Joe: Tohle je můj dům, až budeš mít dost peněz neboj se použít můj počítač na nákup lístků,
                a tady máš $200 a brokovnici, vim že tě to možná zarazí, ale tady dál od měst se to mutantama
                jen hemží, ale nezapoměň si u Franka nakoupit náboje, jinak ti bude dost k ničemu.
                """);
        try {
            TimeUnit.SECONDS.sleep(1);
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
        System.out.println(this.jmeno + ": Díky.");
    }
}
