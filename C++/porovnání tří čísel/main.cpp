#include <iostream>

using namespace std;

int main()
{
    int cisloPred, cisloZa, prvni, druhe, treti, porovnavaneCislo, rovnase1, rovnase2;
    int cislaABC[3];
    int srovnanaCislaABC[3];
    char ABC[3];
    ABC[0] = 'A';
    ABC[1] = 'B';
    ABC[2] = 'C';
    char srovnaneABC[3];
    bool vetsiMensi1, vetsiMensi2;

    cout << "Zadejte cislo pro porovnani (1/3)" << endl;
    cin >> cislaABC[0];
    cout << "\nZadejte cislo pro porovnani (2/3)" << endl;
    cin >> cislaABC[1];
    cout << "\nZadejte cislo pro porovnani (3/3)" << endl;
    cin >> cislaABC[2];
    cout << endl<<endl;


    for(int i = 0; i < 3; i++){
        porovnavaneCislo = cislaABC[i];
        switch(i){
        case 0:
            {
                cisloPred = cislaABC[1];
                cisloZa = cislaABC[2];
                break;
            }
        case 1:
            {
                cisloPred = cislaABC[2];
                cisloZa = cislaABC[0];
                break;
            }
        case 2:
            {
                cisloPred = cislaABC[0];
                cisloZa = cislaABC[1];
                break;
            }
        }

        vetsiMensi1 = cisloPred > porovnavaneCislo;
        vetsiMensi2 = cisloZa > porovnavaneCislo;
        rovnase1 = cisloPred == porovnavaneCislo;
        rovnase2 = cisloZa == porovnavaneCislo;

        if(rovnase1 == 0 && rovnase2 == 0){
            if(vetsiMensi1 == 1 && vetsiMensi2 == 1){
                srovnanaCislaABC[2] = porovnavaneCislo;
                srovnaneABC[2] = ABC[i];
            }else if(vetsiMensi1 == 0 && vetsiMensi2 == 0){
                srovnanaCislaABC[0] = porovnavaneCislo;
                srovnaneABC[0] = ABC[i];
            }else{
                srovnanaCislaABC[1] = porovnavaneCislo;
                srovnaneABC[1] = ABC[i];
            }
        }else if(rovnase1 == 1 && rovnase2 == 1){
            for(int i = 0; i<3; i++){
                cout << ABC[i] << " " << cislaABC[i] << endl;
            }
            return 0;
        }else{
            if(rovnase1 == 1 && vetsiMensi2 == 0){
                if(srovnanaCislaABC[0] == porovnavaneCislo){
                    srovnanaCislaABC[1] = porovnavaneCislo;
                    srovnaneABC[1] = ABC[i];
                }else{
                    srovnanaCislaABC[0] = porovnavaneCislo;
                    srovnaneABC[0] = ABC[i];
                }


            }else if(rovnase1 == 1 && vetsiMensi2 == 1){
                if(srovnanaCislaABC[2] == porovnavaneCislo){
                    srovnanaCislaABC[1] = porovnavaneCislo;
                    srovnaneABC[1] = ABC[i];
                }else{
                    srovnanaCislaABC[2] = porovnavaneCislo;
                    srovnaneABC[2] = ABC[i];
                }


            }else if(rovnase2 == 1 && vetsiMensi1 == 0){
                if(srovnanaCislaABC[0] == porovnavaneCislo){
                    srovnanaCislaABC[1] = porovnavaneCislo;
                    srovnaneABC[1] = ABC[i];
                }else{
                    srovnanaCislaABC[0] = porovnavaneCislo;
                    srovnaneABC[0] = ABC[i];
                }


            }else if(rovnase2 == 1 && vetsiMensi1 == 1){
                if(srovnanaCislaABC[2] == porovnavaneCislo){
                    srovnanaCislaABC[1] = porovnavaneCislo;
                    srovnaneABC[1] = ABC[i];
                }else{
                    srovnanaCislaABC[2] = porovnavaneCislo;
                    srovnaneABC[2] = ABC[i];
                }
            }
        }

    }
    for(int i = 0; i < 3; i++){
        cout << srovnaneABC[i] << " " << srovnanaCislaABC[i] << endl;
    }

    return 0;
}
