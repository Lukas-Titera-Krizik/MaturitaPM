import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.NodeList;
import org.w3c.dom.Node;
import org.w3c.dom.Element;
import java.io.File;


public class Ctecka2 {
    static int momenatlniMistnost = 0;
    static int vystup1;
    static int vystup2;
    static int utok;
    static boolean hotovo1, hotovo2, hotovo3, hotovo4 = false;
    public static void cteni() {


        try {
            File fXmlFile = null;
            switch(Databaze.hrac.lokace){
                case 1: {
                    fXmlFile = new File("Hra\\textové dokumenty\\lokace\\dum.xml");
                    break;
                }
                case 2: {
                    fXmlFile = new File("Hra\\textové dokumenty\\lokace\\benzinka.xml");
                    break;
                }
                case 3: {
                    fXmlFile = new File("Hra\\textové dokumenty\\lokace\\les.xml");
                    break;
                }
                case 4: {
                    fXmlFile = new File("Hra\\textové dokumenty\\lokace\\laborator.xml");
                    break;
                }
            }

            DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
            Document doc = dBuilder.parse(fXmlFile);
            doc.getDocumentElement().normalize();

            NodeList list = doc.getElementsByTagName("mistnost");

            Node nNode = list.item(momenatlniMistnost);

            if (nNode.getNodeType() == Node.ELEMENT_NODE) {
                Element eElement = (Element) nNode;

                vystup1 = Integer.parseInt(eElement.getElementsByTagName("cesta1").item(0).getTextContent());
                vystup2 = Integer.parseInt(eElement.getElementsByTagName("cesta2").item(0).getTextContent());
                utok = Integer.parseInt(eElement.getElementsByTagName("utok").item(0).getTextContent());
                int odmena = Integer.parseInt(eElement.getElementsByTagName("odmena").item(0).getTextContent());

                if (odmena == 400 && hotovo1 == false){
                    hotovo1 = true;
                    Databaze.hrac.penize += odmena;
                }else if (odmena == 450 && hotovo2 == false){
                    hotovo2 = true;
                    Databaze.hrac.penize += odmena;
                }else if (odmena == 300 && hotovo3 == false){
                    hotovo3 = true;
                    Databaze.hrac.penize += odmena;
                }else if (odmena == 350 && hotovo4 == false){
                    hotovo4 = true;
                    Databaze.hrac.penize += odmena;
                }
                System.out.println(eElement.getElementsByTagName("popis").item(0).getTextContent());
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
