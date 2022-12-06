#include <bits/stdc++.h>

using namespace std;


int main(int argc, char* argv[]){
    float n;
    n = atoi(argv[1]);
    //int N = argv[1];
    printf("arg = %d\n", n);
//     cin >>N;
    int count =0;
     for(int i = 0;i< n; ++i){
         ++count;
         cout << "Hello while!!!: " << count << endl;
     }
}
