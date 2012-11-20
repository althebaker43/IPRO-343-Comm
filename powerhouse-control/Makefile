SOURCE_DIR=src
BINARY_DIR=bin

COMMUNICATIONS=comm

comm.o : clean
	gcc \
		-c $(SOURCE_DIR)/$(COMMUNICATIONS).c \
		-o $(BINARY_DIR)/$(COMMUNICATIONS).o

clean :
	rm -rf bin/*
