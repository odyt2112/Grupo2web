import PyPDF2

pdf_file = open("D:/proyectoPdf/00351_2160141_UI_0.pdf","rb")
reader = PyPDF2.PdfReader(pdf_file)
page = reader._get_page(0)
texto = page.extract_text()
buscar = "Quote"
codigo = ""
codigo1 = ""
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


pdf_file1 = open("D:/proyectoPdf/FILE-10-107-72-7-2938220468168764-1669818732706_edited version.pdf","rb")
reader1 = PyPDF2.PdfReader(pdf_file1)
page1 = reader1._get_page(0)
texto1 = page1.extract_text()
buscar1 = "Quote"
buscar11 = "  Contract/Sales Order"
count = 0
with open("D:/proyectoPdf/textopdf1.txt","w") as txt1 :
    txt1.write(texto1)
with open('D:/proyectoPdf/textopdf1.txt', 'r') as file1:
    # Skip header line
    line1 = file1.readline()
    while line1:
        line1 = file1.readline()
        if count == 1:
            count = 0
            codigo1 = line1
        if line1.find(buscar11) == 0:
            count = 1
if codigo1.__eq__(codigo1):
    print("!!!!!!!!!!!!!!!Palabras encontradas!!!!!!!!!!!!!!!!!!")
else:
    print("Buuuuuuuuuuuuuuuu")