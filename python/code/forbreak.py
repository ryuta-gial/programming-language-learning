for i in range(10):
   if i == 999:
      break
else:
   print("Unbroken 1")

for i in range(10):
   if i == 5:
      break
else: 
   print("Unbroken 2")


for i in range(10):
   if i > 5:
      print(i)
      break
else:
   print("7")

try:
   print(1)
except ZeroDivisionError:
   print(2)
else:
   print(3)

try:
   print(1/0)
except ZeroDivisionError:
   print(4)
else:
   print(5)



try:
  print(1)
  print(1 + "1" == 2)
  print(2)
except TypeError:
  print(3)
else:
  print(4)
