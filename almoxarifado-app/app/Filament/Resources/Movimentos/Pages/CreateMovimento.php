<?php

namespace App\Filament\Resources\Movimentos\Pages;

use App\Filament\Resources\Movimentos\MovimentoResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Produto;
use App\Models\Movimento; 
use Filament\Notifications\Notification;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;
    /**
     * O que o beforeCreate faz?
     * ......
     * 
     * @param $data - recebe uma lista de produtos
     * @param $produto - recebe o id do produto (a ser selecionado pelo usuário) na tela de Movimentos
     * @param $quantidade - recebe o valor do campo quantidade de $produto anteriormente selecionado
     * @param $tipo - recebe o valor do campo tipo $produto anteriormente selecionado
     */

    protected function beforeCreate(): void 
    {
        //recebe a lista de produtos 
        $data = $this->data;

        //selecionando o produto/qntd e tipo pelo id recebido na lista
        $produto = Produto::find($data['produto_id']);
        $quantidade = $data['quantidade'];
        $tipo = $data['tipo'];


        //verificar se é uma saída e se o estoque é suficiente 
        if ($tipo === 's' && $quantidade > $produto->estoque) {
            // notificar se o usuário sobre o estoque insuficiente 
            Notification::make()
                ->danger()
                ->body("O estoque de '{$produto->$nome}' é de apenas {$produto->estoque} unidade, mas você tentou retirar {$quantidade}.")
                ->send();

            this->halt(); //Impede a criação do movimento 
        }
                
    }

    //Hock = Remover ou aumentar o estoquw 
    protected function afterCreate(): void
    {
        $movimento = $this->getRecord(); // Registro do movimento criado
        $produto = $movimento->produto; // Produto relacionado ao movimento

        if ($movimento->tipo === 'e') {
            //Entrada: aumentar o estoque
            $produto->increment('estoque', $movimento->quantidade);
        } else {
            // saída: diminuir o estoque 
            $produto->decrement('estoque', $movimento->quantidade);
        }
    }
}
