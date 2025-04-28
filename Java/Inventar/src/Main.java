import java.util.ArrayList;
import java.util.Scanner;

public class Main {

    public static void clearConsole() {
        for (int i = 0; i < 50; ++i) System.out.println();
    }

    public static void main(String[] args) {

        Mine mine = new Mine();
        Inventory inventory = new Inventory();

        Boolean leave = false;
        Scanner input = new Scanner(System.in);
        String choice;

        do{
            //clearConsole();

            System.out.printf("\nWelcome to the MINES!!!\n\n" +
                    " What do you want to do?\n" +
                    "   1. Go Minin!!!\n" +
                    "   2. Look inside my bag\n" +
                    "   3. Sell stuff\n" +
                    "   4. Leave\n" +
                    "\n" +
                    " Choose action: ");
            choice = input.nextLine();

            switch (choice){
                case "1":{

                    inventory.addItem(mine.mining());

                    break;
                }

                case "2":{

                    inventory.showInventory();

                    break;
                }

                case "3":{

                    inventory.sellItems();

                    break;
                }

                case "4":{

                    leave = true;

                    break;
                }
            }

        }while(leave == false);


    }
}