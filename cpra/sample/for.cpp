#include <bits/stdc++.h>

using namespace std;

int main(int argc, char* argv[]){
    float N;
    N = atof(argv[1]);
    //int N = argv[1];
    printf("arg = %s\n", N);
//     cin >>N;
    int count =0;
     for(int i = 0;i< N; ++i){
         ++count;
         cout << "Hello while: " << count << endl;
     }
}
