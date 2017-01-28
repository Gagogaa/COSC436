;;; uncomment following two lines if using 16f627 or 16f628. config uses internal oscillator
	LIST	p=16F628		;tell assembler what chip we are using
	include "/opt/microchip/mplabx/v3.50/mpasmx/p16f628.inc"		;include the defaults for the chip
	__config 0x3D18			;sets the configuration settings (oscillator type etc.)

;;; IMPORTANT : The following is very important
;;; Recall: there is user RAM available starting at location 0x20 upto 0x77 in each bank
;;; Instead of referring to these locations by NUMBER, why not refer to them by NAME
;;; In the example below, counta is an alias for location 0x20, counta is an alias for
;;; location 0x21, countb is an alias for location 0x22. HIGHLY RECOMMENDED
	cblock 	0x20 	;start of general purpose registers
		counta 			;xused in delay routine 
		countb 			;used in delay routine
		countc			;used in delay routine
	endc

;;; turn comparators off (make it like a 16F84)
	movlw	0x07
	movwf	CMCON			
	
;;; set b port for output, a port for input
	bsf		STATUS,RP0 	; switch to bank 1
	movlw	0x00
	movwf	TRISB			; portb is output
	movlw	0xff
	movwf	TRISA			; porta is input
	bcf		STATUS,RP0	; return to bank 0

loooop
	movlw	0x00			; turn the led off
	movwf	PORTB

	call 	delay_1_sec

	movlw	0xff			; turn the led on
	movwf	PORTB

	call 	delay_1_sec

	goto 	loooop

delay_1_sec
	movlw 0x0A
	movwf countc
delay_1_sec_loop
	call	delay_100_milli
	decfsz	countc
	goto	delay_1_sec_loop
	return
	
delay_100_milli
	movlw	0x64
	movwf	countb			; careful!! don't use counta
delay_100_loop
	call 	delay_1_milli
	decfsz	countb
	goto 	delay_100_loop
	return

delay_1_milli
	movlw 0xf9
	movwf	counta
delay_1_loop
	nop
	decfsz	counta
	goto	delay_1_loop
	return

	end




