
<style>
    .container{
        border:1px solid #ccc;
        border-radius:5px;
        margin:1% auto;
        width:500px;
        padding:0 30px 30px 30px;
        font-family: arial;
        background:#f3f781;
    }
    .input{
        width:480px;
        margin:5px auto;
    }
    .form{
        background:#ffa;
        padding:10px;
    }
    .textearea{
        resize: none;
        padding:2px 5px;
    }
    #messages,  #messagem{
        color:red;
        font-weight:bold;
        text-align:center;
    }
    .enviar{
        position:relative;
        top:10px;
        width:175px;
        cursor:pointer;
    }
    .telefone{
        position:relative;
        float:left;
        width:235px;
        top:14px;
    }
    .nomeTelefone{
        position:relative;
        top:9px;
    }
    .cpf{
       margin-left:10px;
       width:235px;
       position:relative;
       top:-5px;
    }
    .nomeCPF{
        position:relative;
        top:-8px;
        left:10px;   
    }
    .nome{
        position:relative;
        top:7px;
    }
    .nomeCompleto{
        position:relative;
        top:7px;
    }
    #idade{
        position:relative;
        top:3px;
    }
</style>
<div class="container">
    <h4><center>Formatação de texto em javascript</center></h4>
    
    <div class="form">

        <form id="formulario" action="index.php" >
        
            <div >Idade entre 18 a 80 anos</div>
            <input id="idade" type="text" autocomplete="off" maxlength="2"  autocomplete="off" size="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onblur="validaIdade()"  onclick="messagem.innerHTML=''"  >    
            
            <span id="messagem"></span> <span id="messages"></span>
            <div class="nomeCompleto">Nome completo</div>
            <input class="input nome" id="nome" type="text" autocomplete="off" onblur="replaceWhiteSpaces(this.value, 'nome');formataNome(this.value,'nome');nomeCompleto()" onclick="messages.innerHTML=''" >    
            
            <div class="nomeTelefone" >Telefone</div>
            <input class="telefone" id="telefone" type="text" autocomplete="off"  placeholder="(99)9999-9999" maxlength="14"  autocomplete="off" size="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="mascTel(this.value,'telefone')" >      
            
            <div class="nomeCPF">CPF</div>
            <input class="cpf" id="cpf" type="text" autocomplete="off"  placeholder="999.999.999-99" maxlength="14"  autocomplete="off" size="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="mascCPF(this.value,'cpf')" >    
            
            <div>Endereço</div>
            <input class="input" id="endereco" type="text" autocomplete="off" onblur="replaceWhiteSpaces(this.value, 'endereco'); formataNome(this.value,'endereco')">    
            
            <div>Observação</div>
            <input class="input" id="observacao" type="text" autocomplete="off" onblur="replaceWhiteSpaces(this.value,'observacao'); wordUpper(this.value,'observacao')">    
            
            <div>Descrição</div>
            <textarea id="textarea" class="input textearea" name="textarea" rows="5" cols="50" onblur="replaceWhiteSpaces(this.value, 'textarea'); wordUpper(this.value,'textarea')"></textarea>
        
            <input class="enviar" type="submit" value="E N V I A R" onclick="return false">
            
        </form>
    
    </div>

    <script>

        // Primeira letra de cada palavra em maiúscula, com exeções.
        function formataNome(str, id) 
        {
            let retorna = document.getElementById(id);
            return retorna.value = str.toLowerCase().replace(/(?:^|\s)(?!da|de|do|e)\S/g, l => l.toUpperCase());
        };
       
        // Primeira letra do texto em maiúscula.
        function wordUpper(str, id) 
        {  
            let retorna = document.getElementById(id);
            return retorna.value = str.charAt(0).toUpperCase() + str.slice(1);
        };

        // Retira espaços desnecessãrios.
        function replaceWhiteSpaces(str, id) 
        {
            let retorna = document.getElementById(id);
            return retorna.value = str.replace(/\s{2,}/g, ' ').trim(); 
        };

        // Não aceita uma palavra apenas no campo
        function nomeCompleto(){
            if(nome.value.length >0){
                if(nome.value.indexOf(' ') < 0 ){
                    messages.innerHTML= 'Digite o nome completo';
                };
            };   
        };

        
        function validaIdade(){
            if(idade.value.length >0){
                if(idade.value < 18 || idade.value > 80){
                    idade.value = "";
                    messagem.innerHTML= 'Idade fora da faixa';
                };
            };
        };



        function mascCPF(valor, id){
            let retorna = document.getElementById(id);
            return retorna.value = valor.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
        }

        function mascTel(valor, id){
            let retorna = document.getElementById(id);
            return retorna.value = valor.replace(/^(\d{2})(\d{5})(\d{4})/, "($1)$2-$3");
        } 
    </script>
</div>