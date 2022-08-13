import java.util.Scanner;

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
        // Validation check to ensure that the user is depositing a amount that is greater than 0
        if(amount > 0){
            balance += amount;
            previousTransaction = amount;
        }else{
            System.out.println("The amount you wish to deposit was invalid. Please Try again.");
        }
    }

    // Allow the user to enter in a amount that they wish to deposit into someone account (to be implemented with database)
    void deposit(int amount, String accountNum){

    }
    
    // Allow the user to withdraw the specified amount from their account
    void withdraw(int amount){
        // Validation check to ensure that the users balance cannot go below 0
        if(amount > 0 && balance - amount >= 0){
            balance -= amount;
            previousTransaction = -amount;
        }else{
            System.out.println("The amount you wish to withdraw was invalid. Please Try again.");
        }
    }

    // Allow the user to see their transaction history 
    void getPreviousTransaction(){
        // Only show the previous transaction but with a database implemented ~ it will show the whole transaction history of that user
        // If the previous transaction is a positive integer then the last transaction was a deposit action
		if(previousTransaction > 0){
			System.out.println("Deposited: +" + previousTransaction);
        // If the previous transaction is a negative integer then the last transaction was a withdrawn action
		}else if(previousTransaction < 0){
			System.out.println("Withdrawn: -" + Math.abs(previousTransaction));
		}else{
			System.out.println("No transaction found!");
		}
    }

    // Allow the user to see their current funds after 'x' amount of years with interest added 
    void calculateInterest(int years){
        // The current bank rate is 1.75%
        double interestRate = 0.0175;
        double newBalance = (balance * interestRate * years) + balance;
        System.out.println("The current interest rate is " + (100 * interestRate) + "%");
		System.out.println("After " + years + " years, you balance will be: " + newBalance);

    }
    
    //Function showing the main menu
	void showMenu(){
		char option = '\0';
		Scanner scanner = new Scanner(System.in);
		System.out.println("Welcome, " + customerName + "!");
		System.out.println("Your ID is: " + customerID);
		System.out.println();
		System.out.println("What would you like to do?");
		System.out.println();
		System.out.println("A. Check your balance");
		System.out.println("B. Make a deposit");
		System.out.println("C. Make a withdrawal");
		System.out.println("D. View previous transaction");
		System.out.println("E. Calculate interest");
		System.out.println("F. Exit");
		
		do{
			System.out.println();
			System.out.println("Enter an option: ");
			char option1 = scanner.next().charAt(0);
			option = Character.toUpperCase(option1);
			System.out.println();
			
			switch(option) {
			//Case 'A' allows the user to check their account balance
			case 'A':
				System.out.println("====================================");
				System.out.println("Balance = $" + balance);
				System.out.println("====================================");
				System.out.println();
				break;
			//Case 'B' allows the user to deposit money into their account using the 'deposit' function
			case 'B':
				System.out.println("Enter an amount to deposit: ");
				int amount = scanner.nextInt();
				deposit(amount);
				System.out.println();
				break;
			//Case 'C' allows the user to withdraw money from their account using the 'withdraw' function
			case 'C':
				System.out.println("Enter an amount to withdraw: ");
				int amount2 = scanner.nextInt();
				withdraw(amount2);
				System.out.println();
				break;
			//Case 'D' allows the user to view their most recent transaction using the 'getPreviousTransaction' function
			case 'D':
				System.out.println("====================================");
				getPreviousTransaction();
				System.out.println("====================================");
				System.out.println();
				break;
			//Case 'E' calculates the accrued interest on the account after a number of years specified by the user
			case 'E':
				System.out.println("Enter how many years of accrued interest: ");
				int years = scanner.nextInt();
				calculateInterest(years);
				break;
			//Case 'F' exits the user from their account
			case 'F':
				System.out.println("====================================");
				break;
			//The default case let's the user know that they entered an invalid character and how to enter a valid one
			default:
				System.out.println("Error: invalid option. Please enter A, B, C, D, or E or access services.");
				break;
			}
		}while(option != 'F');
		System.out.println("Thank you for banking with us!");
	}
}
