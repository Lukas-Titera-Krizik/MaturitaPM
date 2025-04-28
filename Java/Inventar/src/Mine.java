import java.util.ArrayList;

public class Mine {

    ArrayList<Item> rarity1Items = new ArrayList<Item>();

    ArrayList<Item> rarity2Items = new ArrayList<Item>();

    ArrayList<Item> rarity3Items = new ArrayList<Item>();


    public Mine(){
        Item coal = new Item("Coal", 5, 1);
        Item stone = new Item("Stone", 2, 1);
        Item iron = new Item("Iron", 8, 1);

        rarity1Items.add(coal);
        rarity1Items.add(stone);
        rarity1Items.add(iron);

        Item gold = new Item("Gold", 18, 2);
        Item aluminum = new Item("Aluminum", 12, 2);
        Item copper = new Item("Coppeer", 15, 2);

        rarity2Items.add(gold);
        rarity2Items.add(aluminum);
        rarity2Items.add(copper);

        Item diamond = new Item("Diamond", 40, 3);
        Item emerald = new Item("Emerald", 32, 3);
        Item ruby = new Item("Ruby", 28, 3);

        rarity3Items.add(diamond);
        rarity3Items.add(emerald);
        rarity3Items.add(ruby);

    }

    public Item mining(){

        int randomNum = (int)(Math.random() * 101); // 0 to 100
        int randomItem = (int)(Math.floor(Math.random() * 3));
        
        if(randomNum <= 60){

            return rarity1Items.get(randomItem);
            
        } else if (randomNum > 60 && randomNum <= 90) {

            return rarity2Items.get(randomItem);
            
        } else if (randomNum > 90) {

            return rarity3Items.get(randomItem);
            
        }

        return rarity1Items.get(0);

    }
}
