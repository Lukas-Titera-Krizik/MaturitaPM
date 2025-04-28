#include <iostream>

using namespace std;

//zde zacina funkce pro vyber hotovosti
int vyberHotovosti(int uzivatel, int databaze[6][3])
{
    system("cls");
    int zustatek = databaze[uzivatel][2];
    int castkaKVyberu;
    int castkaVypis;
    int pocetBankovek[4];
    int vyberAkce;

    cout << "Zadejte castku k vyberu" << endl;
    cin >> castkaKVyberu;

    castkaVypis = castkaKVyberu;

    system("cls");

    if(castkaKVyberu > zustatek){
        cout << "Nedostatek financi na ucte \n" << endl;
        return zustatek;
    }


    if(castkaKVyberu%200 != 0){
        cout << "Nejmensi mozna bankovka k vyberu je 200Kc \n" << endl;
        return zustatek;
    }

    zustatek = zustatek - castkaKVyberu;

    pocetBankovek[0] = castkaKVyberu/5000;
    castkaKVyberu = castkaKVyberu%5000;

    pocetBankovek[1] = castkaKVyberu/2000;
    castkaKVyberu = castkaKVyberu%2000;

    pocetBankovek[2] = castkaKVyberu/1000;
    castkaKVyberu = castkaKVyberu%1000;

    pocetBankovek[3] = castkaKVyberu/200;
    castkaKVyberu = castkaKVyberu%200;

    cout << "Vybrali jste " << castkaVypis << "kc v techto bankovkach:" << endl << endl;

    for(int i = 0; i < 4; i++){
        if(pocetBankovek[i] != 0){
            cout << pocetBankovek[i] << "x ";
            switch(i){
            case 0:
                cout << "5000" << endl;
                break;

            case 1:
                cout << "2000" << endl;
                break;

            case 2:
                cout << "1000" << endl;
                break;

            case 3:
                cout << "200" << endl;
                break;

            }
        }
    }

    cout << endl;

    do{
        cout << "Vas novy zustatek je:" << endl << " " << zustatek << "kc" << endl << endl;
        cout << "Vyberte akci: \n 1. Zpet" << endl << endl;
        cin >> vyberAkce;
        if(vyberAkce < 0 || vyberAkce > 1){
            system("cls");
            cout << "Neexistujici akce" << endl << endl;
        }
    }while(vyberAkce < 0 || vyberAkce > 1);

    system("cls");

    return zustatek;

}


//zde zacina funkce pro zobrazeni zustatku na uctu
int zobrazeniZustatku(int uzivatel, int databaze[6][3])
{
    int vyberAkce;
    system("cls");


    do{
        cout << "Vas zustatek na uctu je:" << endl << " " << databaze[uzivatel][2] << "kc" << endl << endl;
        cout << "Vyberte akci: \n 1. Zpet" << endl << endl;
        cin >> vyberAkce;
        if(vyberAkce < 0 || vyberAkce > 1){
            system("cls");
            cout << "Neexistujici akce" << endl << endl;
        }
    }while(vyberAkce < 0 || vyberAkce > 1);

    system("cls");
}


//zde zacina funkce pro zmenu PINu
int zmenaPinu(int uzivatel, int databaze[6][3])
{
    int vyberAkce;
    int novyPin, overeniPinu;
    bool shodnePiny;
    system("cls");


    do{
        cout << "Opravdu si chcete zmenit PIN?" << endl << endl;
        cout << "Vyberte akci: \n 1. Zmenit PIN \n 2. Zpet" << endl << endl;
        cin >> vyberAkce;
        if(vyberAkce < 0 || vyberAkce > 2){
            system("cls");
            cout << "Neexistujici akce" << endl << endl;
        }
    }while(vyberAkce < 0 || vyberAkce > 2);

    system("cls");
    do{
        if(vyberAkce == 1){
            do{
                cout << "Zadejte prosim novy PIN:" << endl << endl;
                cin >> novyPin;
                if(novyPin < 1000){
                    system("cls");
                    cout << "PIN nemuze mit mene nez 4 cifry" << endl << endl;
                }else if(novyPin > 9999){
                    system("cls");
                    cout << "PIN nemuze mit vice nez 4 cifry" << endl << endl;
                }
            }while(novyPin < 1000 || novyPin > 9999);


            system("cls");
            cout << "Zopakujte prosim PIN pro overeni" << endl << endl;
            cin >> overeniPinu;
            if(novyPin == overeniPinu){
                system("cls");
                cout << "PIN byl uspesne zmenen" << endl << endl;
                shodnePiny = 1;
            }else{
                system("cls");
                cout << "PINy se neshoduji" << endl << endl;
            }
        }else if(vyberAkce == 2){
            shodnePiny = 1;
            novyPin = databaze [uzivatel][1];
        }
    }while(shodnePiny != 1);

    return novyPin;
}


//zde zacina funkce main
int main()
{
    int databaze[6][3]    {{123456,1234,42000},
                           {234567,2345,69000},
                           {345678,3456,12000},
                           {456789,4567,81000},
                           {567891,5678,53000},
                           {678912,6789,78000}};
    int zadanyLogin, zadaneHeslo, vyberAkce;
    bool uspesnePrihlaseni;
    int cisloUzivatele, pinSpatne = 0;
    int zustatek;

    cout << "Zadejte cislo uctu" << endl;
    cin >> zadanyLogin;
    cout << endl;

    for(int i = 0; i<6; i++){
        if(zadanyLogin == databaze[i][0]){
            do{
                cout << "Zadejte PIN uctu (pokus " << pinSpatne+1 << "/3)" << endl;
                cin >> zadaneHeslo;
                cout << endl;

                if(zadaneHeslo == databaze[i][1]){
                    uspesnePrihlaseni = 1;
                    cisloUzivatele = i;
                }

                if(uspesnePrihlaseni !=1){
                   pinSpatne = pinSpatne + 1;
                }

            }while(pinSpatne < 3 && uspesnePrihlaseni != 1);
        }
    }

    if(uspesnePrihlaseni == 1){
        cout << "Uspesne prihlaseni" << endl << endl;
    }else{
        cout << "Neuspesne prihlaseni" << endl << endl;
        return 0;
    }

    //zde zacina menu
    system("cls");
    do{
        do{
            cout << "Vyberte akci: \n 1. Vybrat hotovost \n 2. Zobrazit zustatek na uctu \n 3. Zmenit PIN \n 4. Konec" << endl << endl;
            cin >> vyberAkce;
            if(vyberAkce < 0 || vyberAkce > 4){
                system("cls");
                cout << "Neexistujici akce" << endl << endl;
            }
        }while(vyberAkce < 0 || vyberAkce > 4);

        system("cls");
        switch(vyberAkce){
            case 1:
            {
                system("cls");
                databaze[cisloUzivatele][2] = vyberHotovosti(cisloUzivatele, databaze);
                break;
            }
            case 2:
            {
                zobrazeniZustatku(cisloUzivatele, databaze);
                break;
            }
            case 3:
            {
                databaze[cisloUzivatele][1] = zmenaPinu(cisloUzivatele, databaze);
                break;
            }
            case 4:
            {
                system("cls");
                cout << "Dekujeme za pouziti TiteraBank" << endl << endl;
                return 0;
                break;
            }
        }
    }while(vyberAkce != 4);
}
