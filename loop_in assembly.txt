.model small
.stack 100h
.data
msg db "Hello World", 0ah, 0dh, '$'
msg1 db "Bye World$"

.code 
mov ax, @data
mov ds, ax  

mov cx,5
l1:
mov ah,9
lea dx, msg
int 21h 
dec cx
jnz l1

mov ah,9
lea dx,msg1
int 21h