
package br.com.sis_doa_svp.dto;



public class DoacaoDTO {

   
   private int codDoacao,CodDoador,codProdutos, data;
   private String nomeDoador, tipoDoacao;

    public int getCodDoacao() {
        return codDoacao;
    }

    public void setCodDoacao(int codDoacao) {
        this.codDoacao = codDoacao;
    }

    public int getCodDoador() {
        return CodDoador;
    }

    public void setCodDoador(int CodDoador) {
        this.CodDoador = CodDoador;
    }

    public int getCodProdutos() {
        return codProdutos;
    }

    public void setCodProdutos(int codProdutos) {
        this.codProdutos = codProdutos;
    }

    public int getData() {
        return data;
    }

    public void setData(int data) {
        this.data = data;
    }

    public String getNomeDoador() {
        return nomeDoador;
    }

    public void setNomeDoador(String nomeDoador) {
        this.nomeDoador = nomeDoador;
    }

    public String getTipoDoacao() {
        return tipoDoacao;
    }

    public void setTipoDoacao(String tipoDoacao) {
        this.tipoDoacao = tipoDoacao;
    }

      
   
}
