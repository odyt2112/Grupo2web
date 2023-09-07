import PyPDF2

pdf_file = open("D:/proyectoPdf/00351_2160141_UI_0.pdf","rb")
reader = PyPDF2.PdfReader(pdf_file)
page = reader._get_page(0)
texto = page.extract_text()
buscar = "Quote"
with open("D:/proyectoPdf/textopdf.txt","w") as txt :
    txt.write(texto)
with open('D:/proyectoPdf/textopdf.txt', 'r') as file:
    # Skip header line
    line = file.readline()
    while line:
        line = file.readline()
        palabra = line.split(" ")
        if palabra[0] == buscar :
            codigo = palabra[2]