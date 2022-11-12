    
package br.com.sis_doa_svp.dto;


public class DoadorDTO {
    private int CodDoador, cpf, telefone, numeroC, dataCadastro;
    private String nome, rua, bairro;

    public int getCodDoador() {
        return CodDoador;
    }

    public void setCodDoador(int CodDoador) {
        this.CodDoador = CodDoador;
    }

    public int getCpf() {
        return cpf;
    }

    public void setCpf(int cpf) {
        this.cpf = cpf;
    }

    public int getTelefone() {
        return telefone;
    }

    public void setTelefone(int telefone) {
        this.telefone = telefone;
    }

    public int getNumeroC() {
        return numeroC;
    }

    public void setNumeroC(int numeroC) {
        this.numeroC = numeroC;
    }

    public int getDataCadastro() {
        return dataCadastro;
    }

    public void setDataCadastro(int dataCadastro) {
        this.dataCadastro = dataCadastro;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getRua() {
        return rua;
    }

    public void setRua(String rua) {
        this.rua = rua;
    }

    public String getBairro() {
        return bairro;
    }

    public void setBairro(String bairro) {
        this.bairro = bairro;
    }

    
    
}
