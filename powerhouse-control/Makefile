SOURCE_DIR=src
INCLUDE_DIR=include
OUTPUT_DIR=bin

MAIN=Main
COMMUNICATIONS=Comm

$(MAIN).o : clean \
	    $(COMMUNICATIONS).o
	gcc \
		-c \
		-I $(INCLUDE_DIR)\
		$(SOURCE_DIR)/$(MAIN).c \
		-o $(OUTPUT_DIR)/$(MAIN).o

$(COMMUNICATIONS).o : clean
	gcc \
		-c \
		-I $(INCLUDE_DIR)\
		$(SOURCE_DIR)/$(COMMUNICATIONS).c \
		-o $(OUTPUT_DIR)/$(COMMUNICATIONS).o

clean :
	rm -rf bin/*
