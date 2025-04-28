#include <iostream>
#include <cmath>

using namespace std;

int main()
{
    int a,b,c = 0;
    int x1,x2 = 0;
    int disrkiminant = 0;

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


    disrkiminant = (b*b) - 4*a*c;
    cout << "disrkiminant = " << disrkiminant;

    return 0;
}
