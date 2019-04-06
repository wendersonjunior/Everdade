<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\Everdade\turmaDAO;
use App\Model\MySQL\Everdade\TurmaModel;

final class turmaController
{
	
	public function getTurma(Request $request, Response $response, array $args): Response
	{
		$turmaDAO = New turmaDAO();
		$data = $request->getQueryParams();
		$turma = $turmaDAO->selecionaTurma($data['idTurma']);

		if (empty($turma)) {
			$response = $response->withStatus(403);
			$response = $response->withJson([
				'message' => 'Turma não encontrada'
			]);
		} else {
			$response = $response->withJson($turma);
		}

		return $response;
	}
	
	public function insertTurma(Request $request, Response $response, array $args): Response
	{
		$turmaDAO = new TurmaDAO();
		$turma = new TurmaModel();

		$data = $request->getParsedBody();

		$turma->setNome($data['nome']);
		$turma->setDisciplina($data['disciplina']);

		$turmaDAO->insereTurma($turma, $data['idProfessor']);

		$response = $response->withJson([
			'message' => 'Turma cadastrada com sucesso'
		]);
 
		return $response;
	}

	public function updateTurma(Request $request, Response $response, array $args): Response
	{
		$turmaDAO = new TurmaDAO();
		$turma = new TurmaModel();

		$data = $request->getParsedBody();

		$turma->setNome($data['nome']);
		$turma->setDisciplina($data['disciplina']);

		$turmaDAO->atualizaTurma($turma, $data['idTurma']);

		$response = $response->withJson([
			'message' => 'Turma atualizada com sucesso'
		]);

		return $response;
	}

	public function deleteTurma(Request $request, Response $response, array $args): Response
	{

		return $response;
	}

	public function getAllTurmas(Request $request, Response $response, array $args): Response
	{
		$turmaDAO = New turmaDAO();
		$data = $request->getQueryParams();
		$turmas = $turmaDAO->selecionaTodasTurmas();

		if (empty($turmas)) {
			$response = $response->withStatus(403);
			$response = $response->withJson([
				'message' => 'Nenhuma turma encontrada'
			]);
		} else {
			$response = $response->withJson($turmas);
		}

		return $response;
	}
}