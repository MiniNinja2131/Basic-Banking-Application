public class Account {
    // Class variables to keep track of everything
    // customerID could be changed in the future if we adapt a database system with this application 
    String customerID;
    String customerName;
    int balance;
    int previousTransaction;

    // Constructor to initialise the Account class
    Account(String customerID, String customerName){
        // this.'x' refers to the class variable in this class rather than the parameters from the function
        this.customerID = customerID;
        this.customerName = customerName;
    }

    // Allow the user to enter in a amount that they wish to deposit into their account
    void deposit(int amount){

    }

    // Allow the user to enter in a amount that they wish to deposit into someone account (to be implemented with database)
    void deposit(int amount, String accountNum){

    }
    
    // Allow the user to withdraw the specified amount from their account
    void withdraw(int amount){

    }

    // Allow the user to see their transaction history 
    void getPreviousTransaction(){

    }

    // Allow the user to see their current funds after 'x' amount of years with interest added 
    void calculateInterest(int years){

    }
}
