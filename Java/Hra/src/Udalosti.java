import javax.xml.crypto.Data;
import java.util.Random;
import java.util.concurrent.TimeUnit;

public class Udalosti {

    static Boolean konec = false;
    static Boolean vyhra = false;
    public static void JoeuvDum(){
        Boolean odejit = false;
        do {
            System.out.println("Co uděláš? \n 1. Koupit lístek \n 2. Odejít");
            java.util.Scanner vstup = new java.util.Scanner(System.in);
            int input = vstup.nextInt();
            switch (input) {
                case 1:
                    do {
                        System.out.println("Lístek stojí: 1000,- \nTy máš: " + Databaze.hrac.penize);
                        if (Databaze.hrac.penize >= 1000) {
                            System.out.println("1. Koupit");
                            vstup = new java.util.Scanner(System.in);
                            input = vstup.nextInt();
                            if (input == 1) {
                                System.out.println("Těšíme se na vás na Ceres!");
                                Udalosti.konec = true;
                                odejit = true;
                            }
                        } else {
                            System.out.println("1. Odejít");
                            vstup = new java.util.Scanner(System.in);
                            input = vstup.nextInt();
                            if (input == 1) {
                                odejit = true;
                            }
                        }
                    }while (odejit == false);
                    break;
                case 2:
                    odejit = true;
                    break;
            }
        }while (odejit == false);
    }

    public static void rozcesti(){
        do{
            System.out.println("Kam se vydáš? \n 1. Joeův dům \n 2. Frankova benzinka \n 3. Les \n 4. Opuštěná laboratoř \nOstatní: \n 5. Inventář");
            java.util.Scanner vstup = new java.util.Scanner(System.in);
            int input = vstup.nextInt();
            if(input > 0 && input < 5){
                Databaze.hrac.lokace = input;
                switch (Databaze.hrac.lokace){
                    case 1:
                        Udalosti.JoeuvDum();
                        break;
                    case 2:
                        Udalosti.obchod();
                        break;
                    case 3:
                        Udalosti.chuze();
                        break;
                    case 4:
                        Udalosti.chuze();
                        break;
                }
            }else if(input == 5){
                Udalosti.inventar();
            }else System.out.println("Neplatná lokace!");

        }while(konec == false);
    }
    public static void chuze(){
        Ctecka2.momenatlniMistnost = 0;
        do {
            Ctecka2.cteni();
            java.util.Scanner vstup = new java.util.Scanner(System.in);
            int input = vstup.nextInt();
            switch (input) {
                case 1:
                    if(Ctecka2.utok == 1){
                        Udalosti.Souboj();
                    }
                    if(Udalosti.vyhra == true || Ctecka2.utok == 0){
                        Ctecka2.momenatlniMistnost = Ctecka2.vystup1;
                    }
                    Udalosti.vyhra = false;
                    break;
                case 2:
                    Ctecka2.momenatlniMistnost = Ctecka2.vystup2;
                    break;
                case 3:
                    if(Ctecka2.momenatlniMistnost == 0){
                        Ctecka2.momenatlniMistnost = 666;
                    }
            }

        }while(Ctecka2.momenatlniMistnost != 666 && Databaze.hrac.stav == true);
    }

    public static void obchod(){
        Random nahoda = new Random();
        Boolean odejit = false;
        do {
            System.out.println("Frank: Nazdar kluku! Chceš něco koupit? \n");
            System.out.println("Tvoje peníze: " + Databaze.hrac.penize + "\n");
            System.out.println("Zbraně: \n 1. " + Databaze.databazeZbrani[0].jmeno + " (" + Databaze.databazeZbrani[0].cena + ",-)" + "\n 2. " + Databaze.databazeZbrani[1].jmeno + " (" + Databaze.databazeZbrani[1].cena + ",-)"+ "\n 3. " + Databaze.databazeZbrani[2].jmeno + " (" + Databaze.databazeZbrani[2].cena + ",-)");
            System.out.println("Pití: \n 4. HealthDrink (15,-) \n 5. EnergyDrink (10,-)\n");
            System.out.println("6. Náboje");
            System.out.println("7. Inventář");
            System.out.println("8. Odejít");
            java.util.Scanner vstup = new java.util.Scanner(System.in);
            int input = vstup.nextInt();
            switch (input) {
                case 1: {
                    if (Databaze.databazeZbrani[0].cena <= Databaze.hrac.penize) {
                        Databaze.hrac.penize = Databaze.hrac.penize - Databaze.databazeZbrani[0].cena;
                        System.out.println("Frank: Tak je tvoje! Skoro jako zbrusu nová. \n Vyber slot pro umístění (tato akce vymaže původní zbraň ze slotu)");
                        for (int i = 0; i < 3; i++) {
                            System.out.println((i + 1) + ". " + Databaze.hrac.hracovaZbran[i].jmeno);
                        }
                        vstup = new java.util.Scanner(System.in);
                        input = vstup.nextInt();
                        switch (input) {
                            case 1: {
                                Databaze.hrac.hracovaZbran[0] = Databaze.databazeZbrani[0];
                                break;
                            }
                            case 2: {
                                Databaze.hrac.hracovaZbran[1] = Databaze.databazeZbrani[0];
                                break;
                            }
                            case 3: {
                                Databaze.hrac.hracovaZbran[2] = Databaze.databazeZbrani[0];
                                break;
                            }
                        }
                    } else System.out.println("Frank: Promiň kluku, ale tolikdle peněz nebude stačit.");
                    break;
                }
                case 2: {
                    if (Databaze.databazeZbrani[1].cena <= Databaze.hrac.penize) {
                        Databaze.hrac.penize = Databaze.hrac.penize - Databaze.databazeZbrani[1].cena;
                        System.out.println("Frank: Tak je tvoje! Skoro jako zbrusu nová. \n Vyber slot pro umístění (tato akce vymaže původní zbraň ze slotu)");
                        for (int i = 0; i < 3; i++) {
                            System.out.println((i + 1) + ". " + Databaze.hrac.hracovaZbran[i].jmeno);
                        }
                            vstup = new java.util.Scanner(System.in);
                            input = vstup.nextInt();
                            switch (input) {
                                case 1: {
                                    Databaze.hrac.hracovaZbran[0] = Databaze.databazeZbrani[1];
                                    break;
                                }
                                case 2: {
                                    Databaze.hrac.hracovaZbran[1] = Databaze.databazeZbrani[1];
                                    break;
                                }
                                case 3: {
                                    Databaze.hrac.hracovaZbran[2] = Databaze.databazeZbrani[1];
                                    break;
                                }
                            }
                    } else System.out.println("Frank: Promiň kluku, ale tolikdle peněz nebude stačit.");
                    break;
                }
                case 3: {
                    if (Databaze.databazeZbrani[2].cena <= Databaze.hrac.penize) {
                        Databaze.hrac.penize = Databaze.hrac.penize - Databaze.databazeZbrani[2].cena;
                        System.out.println("Frank: Tak je tvoje! Skoro jako zbrusu nová. \n Vyber slot pro umístění (tato akce vymaže původní zbraň ze slotu)");
                        for (int i = 0; i < 3; i++) {
                            System.out.println((i + 1) + ". " + Databaze.hrac.hracovaZbran[i].jmeno);
                        }
                            vstup = new java.util.Scanner(System.in);
                            input = vstup.nextInt();
                            switch (input) {
                                case 1: {
                                    Databaze.hrac.hracovaZbran[0] = Databaze.databazeZbrani[2];
                                    break;
                                }
                                case 2: {
                                    Databaze.hrac.hracovaZbran[1] = Databaze.databazeZbrani[2];
                                    break;
                                }
                                case 3: {
                                    Databaze.hrac.hracovaZbran[2] = Databaze.databazeZbrani[2];
                                    break;
                                }

                            }
                    } else System.out.println("Frank: Promiň kluku, ale tolikdle peněz nebude stačit.");
                    break;
                }
                case 4: {
                    System.out.println("Frank: Jeden HealthDrink stojí 15,- kolik jich chceš?");
                    vstup = new java.util.Scanner(System.in);
                    input = vstup.nextInt();
                    if (input * 15 <= Databaze.hrac.penize) {
                        Databaze.hrac.penize = Databaze.hrac.penize - (input * 15);
                        Databaze.hrac.zdraviPiti = Databaze.hrac.zdraviPiti + input;
                        System.out.println("Tak a jsou tvoje!");
                    } else System.out.println("Frank: Promiň kluku, ale tolikdle peněz nebude stačit.");
                    break;
                }
                case 5: {
                    System.out.println("Frank: Jeden EnergyDrink stojí 10,- kolik jich chceš?");
                    vstup = new java.util.Scanner(System.in);
                    input = vstup.nextInt();
                    if (input * 10 <= Databaze.hrac.penize) {
                        Databaze.hrac.penize = Databaze.hrac.penize - (input * 10);
                        Databaze.hrac.zdraviPiti = Databaze.hrac.zdraviPiti + input;
                        System.out.println("Tak a jsou tvoje!");
                    } else System.out.println("Frank: Promiň kluku, ale tolikdle peněz nebude stačit.");
                    break;
                }
                case 6:{
                    System.out.println("Frank: A kolik jich chceš? Jeden  je za 2,-");
                    vstup = new java.util.Scanner(System.in);
                    int naboje = vstup.nextInt();
                    if(Databaze.hrac.penize > naboje*2) {
                        System.out.println("Frank: Do jaký zbraně chceš náboje?");
                        for (int i = 0; i < 3; i++) {
                            System.out.println((i + 1) + ". " + Databaze.hrac.hracovaZbran[i].jmeno);
                        }
                        vstup = new java.util.Scanner(System.in);
                        input = vstup.nextInt();
                        if(input > 0 && input < 4){
                            Databaze.hrac.hracovaZbran[input-1].naboje += naboje;
                            Databaze.hrac.penize -= naboje*2;
                            System.out.println("Tak jsou tvoje!");
                        }else System.out.println("Takovou ani nemáš!");
                    }else System.out.println("Tolik peněz ti nebude stačit.");
                    break;

                }
                case 7: {
                    Udalosti.inventar();
                    break;
                }
                case 8: {
                    System.out.println("Frank: Tak nazdar!");
                    odejit = true;
                    break;
                }
            }
        }while(odejit == false);
    }
    public static void inventar(){
        System.out.println("Peníze: " + Databaze.hrac.penize);
        System.out.println("(Vyberte pomocí klávecnice)\n");
        System.out.println("Zbraně: \n 1. " + Databaze.hrac.hracovaZbran[0].jmeno + " (náboje: " + Databaze.hrac.hracovaZbran[0].naboje + ")" + "\n 2. " + Databaze.hrac.hracovaZbran[1].jmeno + " (náboje: " + Databaze.hrac.hracovaZbran[1].naboje + ")" + "\n 3. " + Databaze.hrac.hracovaZbran[2].jmeno + " (náboje: " + Databaze.hrac.hracovaZbran[2].naboje + ")" + "\n");
        System.out.println("Ostatní: \n 4. HealDrink: " + Databaze.hrac.zdraviPiti + "\n 5. EnergyDrink: " + Databaze.hrac.energyPiti + "\n 7. Odejít");
        java.util.Scanner vstup = new java.util.Scanner(System.in);
        int input = vstup.nextInt();
        if (input < 4 && input > 0){
            Databaze.hrac.zbranVRuce = input - 1;
        }else if(input == 4){
            if (Databaze.hrac.zdraviPiti > 0){
                if(Databaze.hrac.zdravi < Databaze.hrac.zdraviMax){
                    Databaze.hrac.zdravi = Databaze.hrac.zdravi + 20;
                    if(Databaze.hrac.zdravi > Databaze.hrac.zdraviMax){
                        Databaze.hrac.zdravi = Databaze.hrac.zdraviMax;
                    }
                    Databaze.hrac.zdraviPiti = Databaze.hrac.zdraviPiti - 1;
                }else System.out.println("Již máte plný počet životů");
            }else System.out.println("Neodstatek pití");
        }else if(input == 5){
            if (Databaze.hrac.energyPiti > 0){
                if(Databaze.hrac.energie < Databaze.hrac.energieMax){
                    Databaze.hrac.energie = Databaze.hrac.energie + 20;
                    if(Databaze.hrac.energie > Databaze.hrac.energieMax){
                        Databaze.hrac.energie = Databaze.hrac.energieMax;
                    }
                    Databaze.hrac.energyPiti = Databaze.hrac.energyPiti - 1;
                }else System.out.println("Již máte plný počet energie");
            }else System.out.println("Neodstatek pití");
        }else{

        }
    }
    public static void Souboj(){
        Boolean konectahu = false;
        Random nahoda = new Random();
        Protivnik nepritel = new Protivnik();           //tato část metody stará o vytvoření již předefinovaného nepřítele
        Boolean soubojPokracuje = true;
        System.out.println("V cestě ti stojí " + nepritel.jmeno);
        System.out.println("přenost: " + nepritel.presnost);

        do{
            if(nepritel.stav == true && soubojPokracuje == true){
                //tah nepřítele
                System.out.println(nepritel.jmeno + " útočí");
                try {
                    TimeUnit.SECONDS.sleep(2);
                } catch (InterruptedException e) {
                    throw new RuntimeException(e);
                }
                if(nepritel.presnost >= nahoda.nextInt(100)){
                    System.out.println("Nepřítel se trefil");
                    Databaze.hrac.zdravi = Databaze.hrac.zdravi - nepritel.utocnaSila;
                    if(Databaze.hrac.zdravi <= 0){
                        Databaze.hrac.stav = false;
                    }
                }else{
                    System.out.println("Nepřítel minul");
                }
            }else soubojPokracuje = false;



            if(Databaze.hrac.stav == true && soubojPokracuje == true){
                //tah hráče
                konectahu = false;
                do{
                    System.out.println("Ty: \n Zdraví: " + Databaze.hrac.zdravi + "\n Energie: " +Databaze.hrac.energie + "\n");
                    System.out.println(nepritel.jmeno + ": \n Zdraví: " + nepritel.zdravi + "\n");
                    System.out.println("Co uděláš?: \n 1. Zaútočit (" + Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].jmeno + ") \n 2. Otevřít inventář \n 3. Pokus o útěk (šance 20%)");
                    java.util.Scanner vstup = new java.util.Scanner(System.in);
                    int input = vstup.nextInt();
                switch(input){
                    case 1:{
                        if(Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].naboje > 0 && Databaze.hrac.energie > 0){
                            Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].naboje = Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].naboje - 1;
                            System.out.println("Útočíš za pomocí " + Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].jmeno);
                            try {
                                TimeUnit.SECONDS.sleep(1);
                            } catch (InterruptedException e) {
                                throw new RuntimeException(e);
                            }
                            if(Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].presnost >= nahoda.nextInt(100)){
                                nepritel.zdravi = nepritel.zdravi - Databaze.hrac.hracovaZbran[Databaze.hrac.zbranVRuce].utocnaSila;
                                System.out.println("Trefil ses!");
                                if(nepritel.zdravi <= 0){
                                    nepritel.stav = false;
                                }
                            }else System.out.println("Minul si!");
                            Databaze.hrac.energie = Databaze.hrac.energie - 10;
                            konectahu = true;
                        }else System.out.println("Nedostatek nábojů, nebo energie");
                        break;
                    }
                    case 2:{
                        Udalosti.inventar();
                        break;
                    }
                    case 3:{
                        try {
                            TimeUnit.SECONDS.sleep(1);
                        } catch (InterruptedException e) {
                            throw new RuntimeException(e);
                        }
                        if(nahoda.nextInt(100) < 20){
                            System.out.println("Útěk se podařil");
                            soubojPokracuje = false;
                        }else System.out.println("Pokusil ses utéct, ale zakopl si");
                        konectahu = true;
                        break;
                    }
                }
                }while(konectahu == false);


            }else soubojPokracuje = false;
        }while(soubojPokracuje == true);

        if(nepritel.stav == false){
            System.out.println("Vyhrál jsi souboj!");
            Udalosti.vyhra = true;
        }else{
            System.out.println("Prohrál jsi souboj!");
            Udalosti.vyhra = false;
        }

    }
}

