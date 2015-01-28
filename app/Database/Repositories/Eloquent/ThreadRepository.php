<?php
/**
 * Thread repository implementation, using Eloquent ORM.
 *
 * @version 1.0.0
 * @author MyBB Group
 * @license LGPL v3
 */

namespace MyBB\Core\Database\Repositories\Eloquent;


use MyBB\Core\Database\Models\Thread;
use MyBB\Core\Database\Repositories\IThreadRepository;

class ThreadRepository implements IThreadRepository
{
    /**
     * @var Thread $threadModel
     * @access protected
     */
    protected $threadModel;

    /**
     * @param Thread $threadModel The model to use for threads.
     */
    public function __construct(Thread $threadModel) // TODO: Inject permissions container? So we can check thread permissions before querying?
    {
        $this->threadModel = $threadModel;
    }

    /**
     * Get all threads.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->threadModel->all();
    }

    /**
     * Get all threads created by a user.
     *
     * @param int $userId The ID of the user.
     *
     * @return mixed
     */
    public function allForUser($userId = 0)
    {
        return $this->threadModel->where('user_id', '=', $userId)->get();
    }

    /**
     * Find a single thread by ID.
     *
     * @param int $id The ID of the thread to find.
     *
     * @return mixed
     */
    public function find($id = 0)
    {
        return $this->threadModel->find($id);
    }
}
