#include <iostream>
#include <vector>

using namespace std;



class Student{
    public:

    string name;
    string surname;
    vector<int> grades;

    Student(string iName, string iSurname){
        name = iName;
        surname = iSurname;

    }


};

int printStudents(vector<Student> students){
    int position;

    do{
    position = 1;
    system("cls");
    cout << "----Programming school----\n\nStudents list:" << endl;

        for(Student student : students){
            cout << "   " << position << ". " << student.name << endl;
            position++;

        }

    cout << endl << "Input the number of a student to show detail: ";
    cin >> position;

    }while(position > students.size() || position < 1);
    return position - 1;

}



int studentDetail(Student student){
    int operationChoice;


    do{


    system("cls");
    cout << student.name << " " << student.surname << endl;
    cout << endl << "Grades:" << endl;

    for (int grade : student.grades){
        cout << grade << " ";

        }

    cout << endl << endl << "1. Add grade   2. Edit student   3. Remove student   4. Exit" << endl << "Choose action: ";

    cin >> operationChoice;


    }while(operationChoice > 4 || operationChoice < 1);


    return operationChoice;


    }

int addGrade(){
    int grade;

    do{
        system("cls");
        cout << "Type in the new grade (1 - 5): ";
        cin >> grade;
    }while(grade < 1 || grade > 5);

    return grade;


}

Student editStudent(Student student){

    system("cls");
    cout << "Type in new name (firstname): ";
    cin >> student.name;

    system("cls");
    cout << "Type in new surname: ";
    cin >> student.surname;

    return student;
}

int main(){

    int chosenStudent;
    int studentDetailChoice;
    string test = "1";
    int testint = stoi(test);
    bool exit = false;



    vector<Student> students;
    Student student1("sigma", "boy");
    students.push_back(student1);

    Student student2("niga", "girl");
    students.push_back(student2);

    Student student3("giga", "man");
    students.push_back(student3);


    do{

        chosenStudent = printStudents(students);

        studentDetailChoice = studentDetail(students.at(chosenStudent));

        if(studentDetailChoice == 1) students.at(chosenStudent).grades.push_back(addGrade());

        if(studentDetailChoice == 2) students.at(chosenStudent) = editStudent(students.at(chosenStudent));

        if(studentDetailChoice == 3) students.erase(students.begin() + chosenStudent);

    }while(exit == false);








    return 0;
}
