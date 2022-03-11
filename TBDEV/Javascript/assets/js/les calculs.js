var x = 5, y = 8, z = -2;

x = x + 1; //x==5+1 ==6
x = x - 2; //x==6-2 ==4
y = y * 2; //y==8*2 ==16

var mult = x * y; 
/*variable multiplication prenant la dernière valeur de chaque variable, sans changer la valeur des variables concernées
La valeur change selon où est placée le calcul dans la page*/
var div = y / z;

// calcul modulo -> reste d'une divison entière
var mod = 13 % 3; //13/3 -> 3 est 4 fois dans 13, et il reste 1, donc mod==1

//Faire attention aux priorités de calcul, exactement comme en arithmétique: multiplication/division puis addition/soustraction



