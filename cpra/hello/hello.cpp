#include <bits/stdc++.h>

using namespace std;

int main (int argc, char* argv[]){
//int main() {
    printf("arg = %s\n", argv[1]);
    string s;
    int counter = 0;
    if (argv[1][0] == '1') ++counter;
    if (argv[1][1] == '1') ++counter;
    if (argv[1][2] == '1') ++counter;
    cout << counter << endl;
}

