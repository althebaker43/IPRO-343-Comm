TARGET = helloworld
OUTPUT_DIR = ../../www/cgi-bin

build :
	gcc $(TARGET).c -o $(OUTPUT_DIR)/$(TARGET)

run : build
	$(OUTPUT_DIR)/$(TARGET)

clean :
	rm -f $(OUTPUT_DIR)/$(TARGET)
