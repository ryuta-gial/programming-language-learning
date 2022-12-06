sqs = [0, 1, 4, 9, 16, 25, 36, 49, 64]
print(sqs[4:7])

squares = [0,1,4,9,16,25,36,49,64,81] 
print(squares[:: 2])
sqs = [0, 1, 4, 9, 16, 25, 36, 49, 64, 81]
print(sqs[7:5:-1])

evens = [i**2 for i in range(10)if i**2 % 2==0]
print(evens)

a = [x*10 for x in range(5,9)]
print(a)
