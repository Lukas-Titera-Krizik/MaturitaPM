//Autor: Lukáš Titìra
#include <iostream>
#include <cmath>

using namespace std;

float nasobek(float a, float b)
{
    float vysledek;
    vysledek = a*b;
    return vysledek;
}

float deleni(float a, float b)
{
    float vysledek;
    vysledek = a/b;
    return vysledek;
}

int main()
{
    float U, R, I, P = 0;
    int vyber, vyberStary;
    string moznosti = "0000";

    for(int i = 0; i<2; i++){
        do{
            cout << "vyberte jakou hodnotu k zadani (" << i+1 << "/2):\n1. Napeti [V]\n2. Odpor [Ohm]\n3. Proud [A]\n4. Vykon [W]" << endl << endl;
            cin >> vyber;
            if(vyber == vyberStary){
                cout << endl << "nelze zadat jiz zadanou hodnotu" << endl << endl;
            }else if(vyber > 4 || vyber < 1){
                vyberStary = vyber;
                cout << endl << "neplatna hodnota" << endl << endl;
            }
        }while(vyber == vyberStary);

        vyberStary = vyber;

        switch(vyber){
        case 1:
            cout << "Zadejte Napeti [V]: ";
            cin >> U;
            moznosti[0] = '1';
            cout << endl;
            break;

        case 2:
            cout << "Zadejte Odpor [Ohm]: ";
            cin >> R;
            moznosti[1] = '1';
            cout << endl;
            break;

        case 3:
            cout << "Zadejte Proud [A]: ";
            cin >> I;
            moznosti[2] = '1';
            cout << endl;
            break;

        case 4:
            cout << "Zadejte Vykon [W]: ";
            cin >> P;
            moznosti[3] = '1';
            cout << endl;
            break;

        default:
            cout << "Tady nemas co delat" << endl;
            return 0;
        }
    }

    if(moznosti == "1100"){
        I = deleni(U,R);
        P = nasobek(U,I);
    }else if(moznosti == "0110"){
        U = nasobek(R,I);
        P = nasobek(U,I);
    }else if(moznosti == "0011"){
        U = deleni(P,I);
        R = deleni(U,I);
    }else if(moznosti == "1010"){
        R = deleni(U,I);
        P = nasobek(U,I);
    }else if(moznosti == "0101"){
        U = sqrt(P*R);
        I = deleni(U,R);
    }else if(moznosti == "1001"){
        I = deleni(P,U);
        R = deleni(U,I);
    }

    system("cls");
    cout << "Vysledne hodnoty:" << endl;
    cout << "1. Napeti [V]: " << U << "\n2. Odpor [Ohm]: " << R << "\n3. Proud [A]: " << I << "\n4. Vykon [W]: " << P << endl;

    return 0;
}
