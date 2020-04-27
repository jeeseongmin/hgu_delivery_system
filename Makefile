CC = gcc
TARGET = market
OBJECTS = market.c manager.o product.o
$(TARGET) : $(OBJECTS)
	$(CC) -o $@ $^

clean :
	rm *.o $(TARGET)
