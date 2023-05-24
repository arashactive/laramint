<?php

namespace App\Services\Back\Educations;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\DepartmentInterfaceRepository;
use App\Repositories\Contracts\SessionTermInterfaceRepository;
use App\Repositories\Contracts\TermInterfaceRepository;
use App\Services\Back\Services;
use App\Services\Traits\CrudableService;

class TermAdminService extends Services
{
    use CrudableService;

    // default variable for path and route
    protected $path = 'contents.admin.term';
    protected $route = 'term';

    // repositories variable
    protected $departmentRepository;
    protected $courseRepository;
    protected $sessionTermRepository;

    public function __construct(
        TermInterfaceRepository $repository,
        CourseInterfaceRepository $courseRepository,
        DepartmentInterfaceRepository $departmentRepository,
        SessionTermInterfaceRepository $sessionTermRepository
    ) {
        $this->repository = $repository;
        $this->departmentRepository = $departmentRepository;
        $this->courseRepository = $courseRepository;
        $this->sessionTermRepository = $sessionTermRepository;
    }

    /**
     * index method
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return $this->repository->getTermWithParticipants();
    }


    /**
     * create prepare for view
     *
     * @return array
     */
    public function create()
    {
        return [
            'departments' => $this->departmentRepository->getAllByTitleAndId(),
            'courses' => $this->courseRepository->getAllByTitleAndId()
        ];
    }

    /**
     * create prepare for view
     * @param int $term_id
     * @return array
     */
    public function edit(
        $term_id
    ) {
        return [
            'term' => $this->repository->findById($term_id),
            'departments' => $this->departmentRepository->getAllByTitleAndId(),
            'courses' => $this->courseRepository->getAllByTitleAndId()
        ];
    }

    /**
     * add a new session to term
     *
     * @param  int $term_id
     * @param  int $session_id
     * @return bool
     */
    public function syncSessionTerm($term_id, $session_id)
    {
        $term = $this->repository->findById($term_id);
        return $term->Sessions()->sync([$session_id => [
            'order' => $term->Sessions()->max('order') + 1
        ]], false);
    }

    /**
     * detach a session from term.
     *
     * @param  int $term_id
     * @param  int $session_id
     * @return bool
     */
    public function detachSessionTerm($term_id, $session_id)
    {
        $term = $this->repository->findById($term_id);
        return  $term->Sessions()->detach($session_id);
    }

    /**
     * change the sequences of file belongs to document
     *
     * @param  int  $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function order($from, $move)
    {
        $from = $this->sessionTermRepository->findById($from);
        if ($move == 'up')
            $toItem = $this->sessionTermRepository->up($from);
        else
            $toItem =  $this->sessionTermRepository->down($from);

        if ($toItem) {
            return $this->sessionTermRepository->swap($from, $toItem);
        }

        return false;
    }
}
