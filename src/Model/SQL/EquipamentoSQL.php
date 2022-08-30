<?php

namespace Src\Model\SQL;



class EquipamentoSQL{

    public static function InserirEquipamentoSQL()
    {
        $sql = 'INSERT into tb_equipamento (identificacao, descricao, tipoequip_id, modeloequip_id) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function ConsultarEquipamentoSQL(){
        $sql = 'SELECT tb_equipamento.id as idEquip, identificacao, descricao, tb_tipoequip.id as idTipo,
                       tb_modeloequip.id as idModelo, tb_tipoequip.nome as nomeTipo, tb_modeloequip.nome as nomeModelo
                            FROM tb_equipamento 
                                inner join tb_tipoequip on 
                                    tb_equipamento.tipoequip_id = tb_tipoequip.id	
                                inner join tb_modeloequip on 
                                    tb_equipamento.modeloequip_id = tb_modeloequip.id ';
        return $sql;
    }

    public static function DetalharEquipamentoSQL()
    {
        $sql = 'SELECT id, identificacao, descricao, tipoequip_id, modeloequip_id
                    FROM tb_equipamento WHERE id = ?';
        return $sql;

    }
    public static function ConsultarEquipamentoBuscaSQL($BuscarTipo, $filtro_palavra)
    {
        $sql = 'SELECT  equip.id as idEquip,
                        tb_tipoequip.nome as nomeTipo,
                        tb_modeloequip.nome as nomeModelo,
                        equip.identificacao as identificacao,
                        equip.descricao as descricao
                    FROM tb_equipamento as equip
                        INNER JOIN tb_tipoequip on equip.tipoequip_id = tb_tipoequip.id
                        INNER JOIN tb_modeloequip on equip.modeloequip_id = tb_modeloequip.id';

        switch ($BuscarTipo) {
            case FILTRO_TIPO:
                $sql .= ' WHERE tb_tipoequip.nome LIKE ?';    
                break;
            case FILTRO_DESCRICAO:
                $sql .= ' WHERE identificacao LIKE ?';    
                break;
            case FILTRO_IDENTIFICACAO:
                $sql .= ' WHERE descricao LIKE ?';    
                break;
            case FILTRO_MODELO:
                $sql .= ' WHERE tb_modeloequip.nome LIKE ?';    
                break;
            
        }
        return $sql;
    }
   
}