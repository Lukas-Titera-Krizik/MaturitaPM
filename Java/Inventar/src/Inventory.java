import java.util.ArrayList;

public class Inventory {
    ArrayList<Item> items = new ArrayList<Item>();
    int coins;

    public void sellItems(){

        if(items.size() > 0){

            int sellValue = 0;

            int invSize = items.size();

            for(int i = 0; i < invSize; i++){

                sellValue += items.get(0).price;
                items.remove(0);

            }

            coins += sellValue;
        }else{
            System.out.println("No items to sell");
        }
    }

    public void addItem(Item item){

        items.add(item);

    }

    public void showInventory(){

        System.out.printf("Your items: \n");

        for(int i = 0; i < items.size(); i++){

            System.out.println("   " + items.get(i).name + " - " + items.get(i).price + " $");

        }
        System.out.printf("\nYou have: " + coins + " $");
    }


}
