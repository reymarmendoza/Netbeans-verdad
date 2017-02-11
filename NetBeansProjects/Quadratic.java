package warmup;
//http://stackoverflow.com/questions/9930181/ant-build-not-working-unable-to-find-a-javac-compiler
import java.util.Set;
import java.util.HashSet;

public class Quadratic {

    /**
     * Find the integer roots of a quadratic equation, ax^2 + bx + c = 0.
     * @param a coefficient of x^2
     * @param b coefficient of x
     * @param c constant term.  Requires that a, b, and c are not ALL zero.
     * @return all integers x such that ax^2 + bx + c = 0.
    this part below is from the original code 
    public static Set<Integer> roots(int a, int b, int c) {
        throw new RuntimeException("not implemented yet;"); // TODO: delete this line when you implement it
    }
	/*
    
    /**
     * Main function of program.
     * @param args command-line arguments
     */
    public static void main(String[] args) {
        System.out.println("For the equation x^2 - 4x + 3 = 0, the possible solutions are:");
        Set<Integer> result = roots(1, -4, 3);
        System.out.println(result);
    }

    //this methos was made by me to calculate the quadratic root following the math formula
    //if i recieve long allows to me work with large amounts of numbers..JUNIT
    public static Set<Integer> roots(long a, long b, long c){
    	//it calculate 2 posible answer according to the formula so i RETURN a set<Integer>
    	Set<Integer> set = new HashSet<Integer>();
    	//math formula 
    	double x1 = (-b + Math.sqrt(Math.pow(b, 2) - (4 * a * c))) / (2 * a);
    	double x2 = (-b - Math.sqrt(Math.pow(b, 2) - (4 * a * c))) / (2 * a);
    	//add both results to the return value
    	set.add((int)Math.round(x1));//round recive a double and return a long
    	set.add((int)Math.round(x2));//if recive float return int    
    	
    	return set;
    }
    
    /* Copyright (c) 2016 MIT 6.005 course staff, all rights reserved.
     * Redistribution of original or derived work requires explicit permission.
     * Don't post any of this code on the web or to a public Github repository.
     */
}
