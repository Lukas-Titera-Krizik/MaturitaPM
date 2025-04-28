#include <iostream>
#include <cmath>

using namespace std;

int main()
{
    int a,b,c, p, q = 0;
    int x1,x2, x = 0;
    int diskriminant = 0;
    int diskriminantPoUprave = 0;

    cout << "-Zadejte abc-" << endl;
    cout << "A = ";
    cin >> a;
    cout << endl;

    cout << "B = ";
    cin >> b;
    cout << endl;

    cout << "C = ";
    cin >> c;
    cout << endl;


    if(a != 0){
    diskriminant = (b*b) - 4*a*c;
    cout << "disrkiminant = " << diskriminant << endl;
    if(diskriminant >= 0){
        diskriminantPoUprave = sqrt(diskriminant);
        x1 = -b + diskriminantPoUprave;
        x1 = (x1)/(2*a);

        x2 = -b - diskriminantPoUprave;
        x2 = (x2)/(2*a);

        cout << "x1 = " << x1 << endl << "x2 = " << x2 << endl;
    }else if(diskriminant == 0){
        diskriminantPoUprave = sqrt(abs(diskriminant));
        q = (diskriminantPoUprave)/(2*a);

        p = (-b)/(2*a);

        cout << "x1 = " << p << "+i" << q << endl;
        cout << "x2 = " << p << "-i" << q << endl;
    }else{
        diskriminantPoUprave = sqrt(abs(diskriminant));
        x1 = -b + diskriminantPoUprave;
        x1 = (x1)/(2*a);

        x2 = -b - diskriminantPoUprave;
        x2 = (x2)/(2*a);

        cout << "x1 = " << x1 << endl << "x2 = " << x2 << endl;
    }



    }else if(a==0){
        if(b==0){
            if(c==0){
                cout<<"rovnice ma nekonecne mnoho reseni"<<endl;
                return 0;
            }else{
                cout<<"rovnice nema reseni"<<endl;
                return 0;
            }
        }else{
            x=-c/b;
            cout<<"x = "<<x<<endl;
            return 0;
        }
    }
    return 0;
}
