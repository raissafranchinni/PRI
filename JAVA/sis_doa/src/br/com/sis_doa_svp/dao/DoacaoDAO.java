
 
package br.com.sis_doa_svp.dao;

import br.com.sis_doa_svp.dto.DoacaoDTO;
import br.com.sis_doa_svp.dto.DoadorDTO;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class DoacaoDAO {
    public DoacaoDAO (){
    }
    
    private ResultSet rs = null;
    private Statement stmt = null;
    
    public boolean inserirDoacao(DoacaoDTO doacaoDTO) { // Removido DoadorDTO pela não necessidade de se adicionar as alterações
        try {
            ConexaoDAO.ConectDB();
            stmt = ConexaoDAO.con.createStatement();
            String comando = "Insert into doacao (nomeDoador, codDoador, "
                    + "codProdutos, data, tipoDoacao) values ( "
                    + "'" + doacaoDTO.getNomeDoador() + ", " // Aspas simples quando for VARCHAR
                    + doacaoDTO.getCodDoador() + ", " // Sem aspas quando for algum valor numérico ou algo do tipo
                    + doacaoDTO.getCodProdutos() + ", " 
                    + doacaoDTO.getData() + ", "
                    + "'" + doacaoDTO.getTipoDoacao() + "')";
            stmt.execute(comando.toUpperCase());
            ConexaoDAO.con.commit();
            stmt.close();
            return true;
        }
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        }
        finally {
            ConexaoDAO.CloseDB();
        }
    }
    
    public boolean excluirDoacao(DoacaoDTO doacaoDTO) {
        try {
            ConexaoDAO.ConectDB();
            stmt = ConexaoDAO.con.createStatement();
            String comando = "Delete from doacao where codDoacao = " + doacaoDTO.getCodDoacao();
            stmt.execute(comando);
            ConexaoDAO.con.commit();
            stmt.close();
            return true;
        }
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        } 
        finally {
            ConexaoDAO.CloseDB();
        }
    }
    
    public boolean alterarDoacao(DoacaoDTO doacaoDTO) {
        try {
            ConexaoDAO.ConectDB();
            stmt = ConexaoDAO.con.createStatement();
            String comando = "Update Doacao set "
                    + "nomeDoador = '" + doacaoDTO.getNomeDoador() + "', "
                    + "codDoador = " + doacaoDTO.getCodDoador() + ", "
                    + "codProdutos = " + doacaoDTO.getCodProdutos() + ", "
                    + "data = " + doacaoDTO.getData() + ", "
                    + "tipoDoacao = '" + doacaoDTO.getTipoDoacao() + "' "
                    + "where codDoacao = " + doacaoDTO.getCodDoacao(); // Fazemos a alteração se baseando no 'codDoacao'
            stmt.execute(comando.toLowerCase());
            ConexaoDAO.con.commit();
            stmt.close();
            return true;
        }
        catch (Exception e) {
            System.out.println(e.getMessage());
            return false;
        }
        finally {
            ConexaoDAO.CloseDB();
        }
    }
    
    public ResultSet consultarDoacao(DoacaoDTO doacaoDTO, int opcao) {
        try {
            ConexaoDAO.ConectDB();
            stmt = ConexaoDAO.con.createStatement();
            String comando = "";
            
             switch (opcao){
                case 1:
                    comando = "Select d.* " +
                              "from doacao d "+
                              "where nomeDoador ilike '" + doacaoDTO.getNomeDoador()+ "%' " +  //aqui a pesquisa é por nome
                              "order by d.nomeDoador";
                    
                break;           

                case 2:
                    comando = "Select d.* " +
                              "from doacao d " +
                              "where d.codDoador = " + doacaoDTO.getCodDoador();
                break;
                
                case 3:
                    comando = "Select d.* " +
                              "from Autor d ";
                break;
            }
            rs = stmt.executeQuery(comando.toLowerCase());
            return rs;
        }
        catch (Exception e) {
            System.out.println(e.getMessage());
            return rs;
        }
    }
}