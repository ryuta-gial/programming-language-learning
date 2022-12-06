def count_char(text, char):
  count = 0
  for c in text:
    if c == char:
      count += 1
  return count


filename = input("Enter a filename: ")
with open(filename) as f:
  text = f.read()

print(count_char(text, "r"))
