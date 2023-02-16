#include <stdlib.h>
#include <stdio.h>
#include <string.h>

int count_size(char *input)
{
	char output[32];

	/* 以下语句存在一个buffer overflow漏洞 */ 
	sprintf(output, "%s has size %d", input, strlen(input));
	puts(output);

	return 1;
}

int main(int argc, char **argv)
{
	char input[512];
	FILE *file;

	file = fopen("file", "r");
	fread(input, sizeof(char), 512, file);
	count_size(input);

	printf("Returned Properly\n");
	return 1;
}
