#include <bits/stdc++.h>
using namespace std;

// a > bが前提
int gcd(int a, int b){
   if (a % b == 0){
       return b;
   } else {
       return gcd(b, a % b);
   }
}

int lcm(int a, int b){
   return a * b / gcd(a, b);
}

int main(){
   int a, b;
   cin >> a >> b;

   cout << "最大公約数:" << gcd(a, b) << endl;
   cout << "最小公倍数:" << lcm(a, b) << endl;
}
